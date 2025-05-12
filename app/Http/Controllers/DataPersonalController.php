<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DataPersonal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class DataPersonalController extends Controller
{
    protected function getFormFields(): array
    {
        return [
            $this->createField('nama_depan', 'Nama Depan', 'text', false),
            $this->createField('nama_belakang', 'Nama Belakang', 'text', false),
            $this->createField('tempat_lahir', 'Tempat Lahir', 'text', false),
            $this->createField('tanggal_lahir', 'Tanggal Lahir', 'date', false),
            $this->createSelectField('agama', 'Agama', false, ['islam', 'katolik', 'protestan', 'hindu', 'budha', 'konghuncu']),
            $this->createField('golongan_darah', 'Golongan Darah', 'text', false),
            $this->createField('no_telepon', 'No Telepon', 'text', false),
            $this->createField('no_ponsel', 'No Ponsel', 'text', false),
            $this->createField('alamat_tinggal', 'Alamat Tinggal', 'textarea', false, ['rows' => 3]),
            $this->createField('propinsi_tinggal', 'Provinsi Tinggal', 'text', false),
            $this->createField('kabupaten_tinggal', 'Kabupaten Tinggal', 'text', false),
            $this->createField('kecamatan_tinggal', 'Kecamatan Tinggal', 'text', false),
            $this->createField('desa_tinggal', 'Desa Tinggal', 'text', false),
        ];
    }

    protected function validateRequest(Request $request): array
    {
        return $request->validate([
            'nama_depan'         => 'nullable|string|max:100',
            'nama_belakang'      => 'nullable|string|max:100',
            'tempat_lahir'       => 'nullable|string|max:100',
            'tanggal_lahir'      => 'nullable|date',
            'agama'              => 'nullable|in:islam,katolik,protestan,hindu,budha,konghuncu',
            'golongan_darah'     => 'nullable|string|max:10',
            'no_telepon'         => 'nullable|string|max:20',
            'no_ponsel'          => 'nullable|string|max:20',
            'alamat_tinggal'     => 'nullable|string|max:255',
            'propinsi_tinggal'   => 'nullable|string|max:100',
            'kabupaten_tinggal'  => 'nullable|string|max:100',
            'kecamatan_tinggal'  => 'nullable|string|max:100',
            'desa_tinggal'       => 'nullable|string|max:100',
        ]);
    }

    protected function defaultAttributes(): array
    {
        return [
            'nama_depan'         => null,
            'nama_belakang'      => null,
            'tempat_lahir'       => null,
            'tanggal_lahir'      => null,
            'agama'              => null,
            'golongan_darah'     => null,
            'no_telepon'         => null,
            'no_ponsel'          => null,
            'alamat_tinggal'     => null,
            'propinsi_tinggal'   => null,
            'kabupaten_tinggal'  => null,
            'kecamatan_tinggal'  => null,
            'desa_tinggal'       => null,
        ];
    }

    public function edit()
    {
        $data = [
            'header_name' => "Data Personal",
            'page_name'   => "Detail Data Personal"
        ];

        $dataPersonal = DataPersonal::firstOrCreate(
            ['user_id' => Auth::id()],
            $this->defaultAttributes()
        );

        $fields = $this->getFormFields();

        return view('role.pages.data-personal', compact('data', 'dataPersonal', 'fields'));
    }

    public function update(Request $request)
    {
        try {
            $validated = $this->validateRequest($request);

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

            DataPersonal::updateOrCreate(
                ['user_id' => $userId],
                $validated
            );

            return redirect()->back()->with('success', 'Data personal berhasil diperbarui.');
        } catch (QueryException $e) {
            // Handle database-related errors
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data. Mohon coba lagi.');
        } catch (\Exception $e) {
            // Handle other types of errors
            return redirect()->back()->with('error', 'Terjadi kesalahan. Mohon coba lagi.');
        }
    }
}
