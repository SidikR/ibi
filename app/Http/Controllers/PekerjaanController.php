<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;

class PekerjaanController extends Controller
{

    protected function validateRequest(Request $request): array
    {
        return $request->validate([
            'status_pekerjaan' => 'required|string',
            'tempat_kerja' => 'required|string',
            'nama_instansi' => 'required_if:status_pekerjaan,pns,honda,hondis,tks,pmb,pegawai_klinik_pmb,karyawan_swasta,wiraswasta|string|max:255',
            'alamat_kerja' => 'required_if:status_pekerjaan,pns,honda,hondis,tks,pmb,pegawai_klinik_pmb,karyawan_swasta,wiraswasta|string|max:255',
            'propinsi_kerja' => 'required_if:status_pekerjaan,pns,honda,hondis,tks,pmb,pegawai_klinik_pmb,karyawan_swasta,wiraswasta|string|max:255',
            'kabupaten_kerja' => 'required_if:status_pekerjaan,pns,honda,hondis,tks,pmb,pegawai_klinik_pmb,karyawan_swasta,wiraswasta|string|max:255',
            'kecamatan_kerja' => 'required_if:status_pekerjaan,pns,honda,hondis,tks,pmb,pegawai_klinik_pmb,karyawan_swasta,wiraswasta|string|max:255',
            'desa_kerja' => 'required_if:status_pekerjaan,pns,honda,hondis,tks,pmb,pegawai_klinik_pmb,karyawan_swasta,wiraswasta|string|max:255',
        ]);
    }

    protected function defaultAttributes(): array
    {
        return [
            'status_pekerjaan'        => null,
            'tempat_kerja'        => null,
            'nama_instansi'     => null,
            'alamat_kerja'   => null,
            'propinsi_kerja'  => null,
            'kabupaten_kerja'  => null,
            'kecamatan_kerja'  => null,
            'desa_kerja'       => null,
        ];
    }

    public function edit()
    {
        $data = [
            'header_name' => "Pekerjaan",
            'page_name'   => "Detail Data Pekerjaan"
        ];

        $pekerjaan = Pekerjaan::firstOrCreate(
            ['user_id' => Auth::id()],
            $this->defaultAttributes()
        );

        // dd($pekerjaan);

        return view('role.pages.pekerjaan', compact('data', 'pekerjaan'));
    }

    public function update(Request $request)
    {
        // dd($request);

        try {
            $validated = $this->validateRequest($request);

            // dd($validated);

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

            Pekerjaan::updateOrCreate(
                ['user_id' => $userId],
                $validated
            );

            return redirect()->back()->with('success', 'Data pekerjaan berhasil diperbarui.');
        } catch (QueryException $e) {
            // Handle database-related errors
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data. Mohon coba lagi.');
        } catch (ValidationException $e) {
            // Handle other types of errors
            return redirect()->back()->with('error', 'Terjadi kesalahan. Mohon coba lagi. ' . $e);
        }
    }
}
