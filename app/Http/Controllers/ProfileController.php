<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(Request $request): View
    {
        $data = [
            'header_name' => "Data Profile",
            'page_name' => "Detail Data Profile"
        ];
        $user = $request->user();
        return view('pages.profile', compact([
            'user',
            'data'
        ]));
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        try {

            $user = $request->user();

            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'no_kta' => 'required|unique:users,no_kta,' . $user->id,
                'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            if ($request->hasFile('foto')) {
                // Hapus foto lama jika ada
                if ($user->foto && Storage::exists(str_replace('storage/', 'public/', $user->foto))) {
                    Storage::delete(str_replace('storage/', 'public/', $user->foto));
                }

                // Simpan foto baru
                $fotoPath = $request->file('foto')->store('public/foto_user');
                $validated['foto'] = str_replace('public/', 'storage/', $fotoPath);
            }

            $user->update($validated);

            return redirect()->back()->with('success', 'Data updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
