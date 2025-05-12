<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kependudukan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class KependudukanController extends Controller
{
    protected function getFormFields(): array
    {
        return [
            $this->createField('nik', 'NIK', 'text', false),
            $this->createField('alamat', 'Alamat', 'textarea', false, ['rows' => 3]),
            $this->createField('propinsi', 'Provinsi', 'text', false),
            $this->createField('kabupaten', 'Kabupaten', 'text', false),
            $this->createField('kecamatan', 'Kecamatan', 'text', false),
            $this->createField('desa', 'Desa', 'text', false),
        ];
    }

    protected function validateRequest(Request $request): array
    {
        return $request->validate([
            'nik'        => 'nullable|string|max:20|unique:kependudukans,nik,' . Auth::id() . ',user_id',
            'alamat'     => 'nullable|string|max:255',
            'propinsi'   => 'nullable|string|max:100',
            'kabupaten'  => 'nullable|string|max:100',
            'kecamatan'  => 'nullable|string|max:100',
            'desa'       => 'nullable|string|max:100',
        ]);
    }

    protected function defaultAttributes(): array
    {
        return [
            'nik'        => null,
            'alamat'     => null,
            'propinsi'   => null,
            'kabupaten'  => null,
            'kecamatan'  => null,
            'desa'       => null,
        ];
    }

    public function edit()
    {
        $data = [
            'header_name' => "Kependudukan",
            'page_name'   => "Detail Data Kependudukan"
        ];

        $kependudukan = Kependudukan::firstOrCreate(
            ['user_id' => Auth::id()],
            $this->defaultAttributes()
        );

        $fields = $this->getFormFields();

        return view('role.pages.kependudukan', compact('data', 'kependudukan', 'fields'));
    }

    public function update(Request $request)
    {
        try {
            $validated = $this->validateRequest($request);

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

            Kependudukan::updateOrCreate(
                ['user_id' => $userId],
                $validated
            );

            return redirect()->back()->with('success', 'Data kependudukan berhasil diperbarui.');
        } catch (QueryException $e) {
            // Handle database-related errors
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data. Mohon coba lagi.');
        } catch (\Exception $e) {
            // Handle other types of errors
            return redirect()->back()->with('error', 'Terjadi kesalahan. Mohon coba lagi.');
        }
    }
}
