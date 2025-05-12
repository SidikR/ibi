<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PendidikanFormal;
use App\Models\PendidikanProfesi;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class PendidikanController extends Controller
{
    public function index()
    {
        $data = [
            'header_name' => "Pendidikan Formal",
            'page_name' => "Riwayat Pendidikan Formal"
        ];

        $pendidikanFormals = Auth::user()->pendidikanFormals;
        $pendidikanProfesis = Auth::user()->pendidikanProfesis;

        return view('role.pages.pendidikan', compact('data', 'pendidikanFormals', 'pendidikanProfesis'));
    }

    public function storePendidikanFormal(Request $request)
    {
        try {
            $validated = $request->validate([
                'jenjang' => 'required|in:SD,SMP,SMA/SMK,D1,D2,D3,D4,S1,S2,S3',
                'jurusan' => 'nullable|string|max:255',
                'nama_pt' => 'required|string|max:255',
                'alamat_pt' => 'nullable|string|max:255',
                'tahun_lulus' => 'required|digits:4',
                'no_ijazah' => 'required|string|max:255',
                'path_ijazah' => 'nullable|file|mimes:pdf|max:2048',
            ]);

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

            $validated['user_id'] = $userId;

            // Handle file upload
            if ($request->hasFile('path_ijazah')) {
                $file = $request->file('path_ijazah');
                $filename = time() . '_' . $file->getClientOriginalName();
                $validated['path_ijazah'] = $file->storeAs('ijazah', $filename, 'public');
            }

            PendidikanFormal::create($validated);

            return redirect()->back()->with('success', 'Pendidikan formal berhasil ditambahkan.');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan data pendidikan. ' . $e->getMessage());
        }
    }

    public function updatePendidikanFormal(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'jenjang' => 'required|string',
            'jurusan' => 'required|string',
            'nama_pt' => 'required|string',
            'alamat_pt' => 'nullable|string',
            'tahun_lulus' => 'required|digits:4',
            'no_ijazah' => 'nullable|string',
            'path_ijazah' => 'nullable|mimes:pdf|max:2048', // Validasi file PDF
        ]);

        try {
            // Ambil data pendidikan formal berdasarkan ID
            $pendidikan = PendidikanFormal::findOrFail($id);

            // Update data pendidikan formal
            $pendidikan->jenjang = $request->input('jenjang');
            $pendidikan->jurusan = $request->input('jurusan');
            $pendidikan->nama_pt = $request->input('nama_pt');
            $pendidikan->alamat_pt = $request->input('alamat_pt');
            $pendidikan->tahun_lulus = $request->input('tahun_lulus');
            $pendidikan->no_ijazah = $request->input('no_ijazah');

            // Cek jika ada file yang diupload
            if ($request->hasFile('path_ijazah')) {
                $file = $request->file('path_ijazah');

                if ($file->getError() !== UPLOAD_ERR_OK) {
                    return back()->with('error', 'Terjadi kesalahan saat mengunggah file.');
                }

                // Hapus file lama jika ada
                if ($pendidikan->path_ijazah && Storage::disk('public')->exists($pendidikan->path_ijazah)) {
                    Storage::disk('public')->delete($pendidikan->path_ijazah);
                }

                // Simpan file baru
                $filename = time() . '-' . $file->getClientOriginalName();
                $path = $file->storeAs('ijazah', $filename, 'public');
                $pendidikan->path_ijazah = $path;
            }

            // Simpan perubahan
            $pendidikan->save();

            // Redirect atau response setelah berhasil update
            return redirect()->back()->with('success', 'Pendidikan Formal berhasil diperbarui.');
        } catch (\Exception $e) {
            // Menangani error, misalnya data tidak ditemukan
            return back()->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
        }
    }


    public function deletePendidikanFormal($id)
    {
        try {
            $pendidikan = PendidikanFormal::findOrFail($id);

            // Hapus file sertifikat jika ada
            if ($pendidikan->path_ijazah && Storage::disk('public')->exists($pendidikan->path_ijazah)) {
                // Debugging: Cek apakah file ditemukan
                Log::info('File ditemukan: ' . $pendidikan->path_ijazah);

                // Hapus file lama jika ada
                Storage::disk('public')->delete($pendidikan->path_ijazah);

                // Debugging: Cek setelah penghapusan
                Log::info('File telah dihapus: ' . $pendidikan->path_ijazah);
            } else {
                Log::warning('File tidak ditemukan: ' . $pendidikan->path_ijazah);
            }

            $pendidikan->delete();

            return response()->json([
                'success' => true,
                'message' => 'Pendidikan Formal berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }




    // pendidikan profesi

    public function storePendidikanProfesi(Request $request)
    {
        try {
            $validated = $request->validate([
                'jenjang' => 'required|in:D3,D4,S1,S2,S3',
                'jurusan' => 'nullable|string|max:255',
                'nama_pt' => 'required|string|max:255',
                'alamat_pt' => 'nullable|string|max:255',
                'tahun_lulus' => 'required|digits:4',
                'no_ijazah' => 'required|string|max:255',
                'path_ijazah' => 'nullable|file|mimes:pdf|max:2048',
            ]);

            $validated['user_id'] = Auth::id();

            // Handle file upload
            if ($request->hasFile('path_ijazah')) {
                $file = $request->file('path_ijazah');
                $filename = time() . '_' . $file->getClientOriginalName();
                $validated['path_ijazah'] = $file->storeAs('ijazah', $filename, 'public');
            }

            PendidikanProfesi::create($validated);

            return redirect()->back()->with('success', 'Pendidikan profesi berhasil ditambahkan.');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan data pendidikan. ' . $e->getMessage());
        }
    }

    public function updatePendidikanProfesi(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'jenjang' => 'required|string',
            'jurusan' => 'required|string',
            'nama_pt' => 'required|string',
            'alamat_pt' => 'nullable|string',
            'tahun_lulus' => 'required|digits:4',
            'no_ijazah' => 'nullable|string',
            'path_ijazah' => 'nullable|mimes:pdf|max:2048', // Validasi file PDF
        ]);

        try {
            // Ambil data pendidikan profesi berdasarkan ID
            $pendidikan = PendidikanProfesi::findOrFail($id);

            // Update data pendidikan profesi
            $pendidikan->jenjang = $request->input('jenjang');
            $pendidikan->jurusan = $request->input('jurusan');
            $pendidikan->nama_pt = $request->input('nama_pt');
            $pendidikan->alamat_pt = $request->input('alamat_pt');
            $pendidikan->tahun_lulus = $request->input('tahun_lulus');
            $pendidikan->no_ijazah = $request->input('no_ijazah');

            if ($request->hasFile('path_ijazah')) {
                $file = $request->file('path_ijazah');

                if ($file->getError() !== UPLOAD_ERR_OK) {
                    return back()->with('error', 'Terjadi kesalahan saat mengunggah file.');
                }

                // Hapus file lama jika ada
                if ($pendidikan->path_ijazah && Storage::disk('public')->exists($pendidikan->path_ijazah)) {
                    Storage::disk('public')->delete($pendidikan->path_ijazah);
                }

                // Simpan file baru
                $filename = time() . '-' . $file->getClientOriginalName();
                $path = $file->storeAs('ijazah', $filename, 'public');
                $pendidikan->path_ijazah = $path; // simpan path relatif seperti 'ijazah/namafile.pdf'
            }

            // Simpan perubahan
            $pendidikan->save();

            // Redirect atau response setelah berhasil update
            return redirect()->back()->with('success', 'Pendidikan Profesi berhasil diperbarui.');
        } catch (\Exception $e) {
            // Menangani error, misalnya data tidak ditemukan
            return back()->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
        }
    }


    public function deletePendidikanProfesi($id)
    {
        try {
            $pendidikan = PendidikanProfesi::findOrFail($id);

            // Hapus file sertifikat jika ada
            if ($pendidikan->path_ijazah && Storage::disk('public')->exists($pendidikan->path_ijazah)) {
                // Debugging: Cek apakah file ditemukan
                Log::info('File ditemukan: ' . $pendidikan->path_ijazah);

                // Hapus file lama jika ada
                Storage::disk('public')->delete($pendidikan->path_ijazah);

                // Debugging: Cek setelah penghapusan
                Log::info('File telah dihapus: ' . $pendidikan->path_ijazah);
            } else {
                Log::warning('File tidak ditemukan: ' . $pendidikan->path_ijazah);
            }

            $pendidikan->delete();

            return response()->json([
                'success' => true,
                'message' => 'Pendidikan Profesi berhasil dihapus.'
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
