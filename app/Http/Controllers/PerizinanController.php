<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Perizinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class PerizinanController extends Controller
{
    protected function getFormFields(): array
    {
        return [
            $this->createField('no_str', 'Nomor STR', 'text', false),
            $this->createField('masa_berlaku_str', 'Masa Berlaku STR', 'date', false),
            $this->createField('no_sipb_fasyankes', 'No SIPB Fasyankes', 'text', false),
            $this->createField('masa_berlaku_sipb_fasyankes', 'Masa Berlaku SIPB Fasyankes', 'date', false),
            $this->createField('no_sipb_praktik_mandiri', 'No SIPB Praktik Mandiri', 'text', false),
            $this->createField('masa_berlaku_sipb_praktik_mandiri', 'Masa Berlaku SIPB Praktik Mandiri', 'date', false),
            $this->createField('no_sipb_bidan_delima', 'No SIPB Bidan Delima', 'text', false),
            $this->createField('masa_berlaku_sipb_bidan_delima', 'Masa Berlaku SIPB Bidan Delima', 'date', false),
        ];
    }

    protected function validateRequest(Request $request): array
    {
        return $request->validate([
            'no_str'                          => 'nullable|string|max:50',
            'masa_berlaku_str'               => 'nullable|date',
            'no_sipb_fasyankes'              => 'nullable|string|max:50',
            'masa_berlaku_sipb_fasyankes'    => 'nullable|date',
            'no_sipb_praktik_mandiri'        => 'nullable|string|max:50',
            'masa_berlaku_sipb_praktik_mandiri' => 'nullable|date',
            'no_sipb_bidan_delima'           => 'nullable|string|max:50',
            'masa_berlaku_sipb_bidan_delima' => 'nullable|date',
        ]);
    }

    protected function defaultAttributes(): array
    {
        return [
            'no_str'                          => null,
            'masa_berlaku_str'               => null,
            'no_sipb_fasyankes'              => null,
            'masa_berlaku_sipb_fasyankes'    => null,
            'no_sipb_praktik_mandiri'        => null,
            'masa_berlaku_sipb_praktik_mandiri' => null,
            'no_sipb_bidan_delima'           => null,
            'masa_berlaku_sipb_bidan_delima' => null,
        ];
    }

    public function edit()
    {
        $data = [
            'header_name' => "Data Perizinan",
            'page_name'   => "Detail Data Perizinan"
        ];

        $perizinan = Perizinan::firstOrCreate(
            ['user_id' => Auth::id()],
            $this->defaultAttributes()
        );

        $fields = $this->getFormFields();

        return view('role.pages.perizinan', compact('data', 'perizinan', 'fields'));
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

            Perizinan::updateOrCreate(
                ['user_id' => $userId],
                $validated
            );

            return redirect()->back()->with('success', 'Data perizinan berhasil diperbarui.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan pada database saat menyimpan data.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
        }
    }
}
