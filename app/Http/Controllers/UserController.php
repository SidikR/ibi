<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Ranting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'header_name' => "Manajemen User",
            'page_name' => "Manajemen Users"
        ];
        $users = User::with(['role', 'ranting'])->get();
        $roles = Role::all();
        $rantings = Ranting::all();
        return view('role.superadmin.pages.users.index', compact('users', 'data', 'roles', 'rantings'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'no_kta' => 'required|unique:users',
                'password' => 'required|min:6',
                'role_id' => 'required',
                'ranting_id' => 'nullable',
                'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Max 2MB
            ]);

            // Handle foto jika diunggah
            if ($request->hasFile('foto')) {
                $fotoPath = $request->file('foto')->store('public/foto_user');
                // Simpan hanya path relatif (tanpa "public/")
                $validated['foto'] = str_replace('public/', 'storage/', $fotoPath);
            }

            // Hash password
            $validated['password'] = Hash::make($validated['password']);

            // Simpan user
            User::create($validated);

            return redirect()->back()->with('success', 'User berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan data. Pesan: ' . $e->getMessage());
        }
    }


    public function update(Request $request, User $user)
    {
        try {

            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'no_kta' => 'required|unique:users,no_kta,' . $user->id,
                'role_id' => 'required|exists:roles,id',
                'ranting_id' => 'nullable|exists:rantings,id',
                'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
                'status_keanggotaan' => 'nullable|boolean',
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

            return redirect()->back()->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    public function delete($id)
    {
        try {
            $user = User::findOrFail($id);
            // Hapus file foto jika ada
            if ($user->foto && Storage::exists(str_replace('storage/', 'public/', $user->foto))) {
                Storage::delete(str_replace('storage/', 'public/', $user->foto));
            }
            // Hapus user
            $user->delete();

            return response()->json([
                'success' => true,
                'message' => 'User berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus user.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function updatePassword(Request $request, User $user)
    {
        try {

            $request->validate([
                'password' => 'required|min:6',
            ]);

            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->back()->with('success', 'Password berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
