<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Support\ValidatedData;

class PelatihanController extends Controller
{
    public function index()
    {
        $data = [
            'header_name' => "Pelatihan",
            'page_name' => "Riwayat Pelatihan"
        ];

        $pelatihans = Auth::user()->pelatihans;

        return view('role.pages.pelatihan', compact('data', 'pelatihans'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'jenis_pelatihan' => 'required',
                'tahun_pelatihan' => 'required|digits:4',
                'deskripsi_pelatihan' => 'nullable|string|max:255',
                'path_sertifikat' => 'nullable|file|mimes:pdf|max:2048',
            ]);

            // Ambil pengguna yang sedang login
            $userId = Auth::id();

            $noKta = session('no_kta');
            // Ambil no_kta dari parameter route

            if ($noKta) {
                // Jika no_kta ada, cari user berdasarkan no_kta
                $user = User::where('no_kta', $noKta)->first();
                if (!$user) {
                    return redirect()->back()->with('error', 'Pengguna dengan No. KTA tersebut tidak ditemukan.');
                }
                $userId = $user->id; // Set user_id berdasarkan hasil query
            }

            // dd($noKta);

            $validated['user_id'] = $userId;

            // Handle file upload
            if ($request->hasFile('path_sertifikat')) {
                $file = $request->file('path_sertifikat');
                $filename = time() . '_' . $file->getClientOriginalName();
                $validated['path_sertifikat'] = $file->storeAs('sertifikat', $filename, 'public');
            }

            Pelatihan::create($validated);

            return redirect()->back()->with('success', 'Pendidikan formal berhasil ditambahkan.');
        } catch (\Exception $e) {
            // Menangani error, misalnya data tidak ditemukan
            return back()->with('error', 'Terjadi kesalahan saat menambah data: ' . $e->getMessage());
        }
    }


    public function update(Request $request, $id)
    {
        try {
            // Validasi input
            $validated = $request->validate([
                'jenis_pelatihan'     => 'required|string',
                'tahun_pelatihan'     => 'required|digits:4',
                'deskripsi_pelatihan' => 'nullable|string',
                'path_sertifikat'     => 'nullable|file|mimes:pdf|max:2048',
            ]);

            // Ambil data pelatihan
            $pelatihan = Pelatihan::findOrFail($id);

            // Update field
            $pelatihan->jenis_pelatihan     = $request->jenis_pelatihan;
            $pelatihan->tahun_pelatihan     = $request->tahun_pelatihan;
            $pelatihan->deskripsi_pelatihan = $request->deskripsi_pelatihan;

            // Proses file upload

            if ($request->hasFile('path_sertifikat')) {
                $file = $request->file('path_sertifikat');

                // Validasi manual error upload
                if ($file->getError() !== UPLOAD_ERR_OK) {
                    return back()->with('error', 'Terjadi kesalahan saat mengunggah file.');
                }

                // Hapus file lama jika ada
                if ($pelatihan->path_sertifikat && Storage::disk('public')->exists($pelatihan->path_sertifikat)) {
                    Storage::disk('public')->delete($pelatihan->path_sertifikat);
                }

                // Simpan file baru
                $filename = time() . '-' . $file->getClientOriginalName();
                $file->storeAs('sertifikat', $filename, 'public');
                $pelatihan->path_sertifikat = $filename;
            }

            $pelatihan->save();

            return redirect()->back()
                ->with('success', 'Pelatihan berhasil diperbarui.');
        } catch (ValidationException $e) {
            return back()->withInput()->with('error', 'Validasi gagal: ' . implode(' ', $e->validator->errors()->all()));
        } catch (\Exception $e) {
            Log::error('Gagal update pelatihan: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }




    public function destroy($id)
    {
        try {
            $pelatihan = Pelatihan::findOrFail($id);

            // Hapus file sertifikat jika ada
            if ($pelatihan->path_sertifikat && Storage::disk('public')->exists($pelatihan->path_sertifikat)) {
                // Debugging: Cek apakah file ditemukan
                Log::info('File ditemukan: ' . $pelatihan->path_sertifikat);

                // Hapus file lama jika ada
                Storage::disk('public')->delete($pelatihan->path_sertifikat);

                // Debugging: Cek setelah penghapusan
                Log::info('File telah dihapus: ' . $pelatihan->path_sertifikat);
            } else {
                Log::warning('File tidak ditemukan: ' . $pelatihan->path_sertifikat);
            }


            $pelatihan->delete();

            return response()->json([
                'success' => true,
                'message' => 'Pelatihan berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
