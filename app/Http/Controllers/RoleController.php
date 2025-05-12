<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    public function select(Request $request)
    {
        if (Auth::user()) {
            return redirect()->to('dashboard/' . Auth::user()->role->name);
        } else {
            Auth::guard('web')->logout();
            return redirect()->route('login')->with('status', 'You are not authorized to access this page.');
        }
    }

    public function index()
    {
        $data = [
            'header_name' => "Manajemen Role",
            'page_name' => "Manajemen Roles"
        ];
        $roles = Role::all();
        return view('role.pages.roles.index', compact('roles', 'data'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required',
            ]);

            Role::create($validated);

            return redirect()->back()->with('success', 'role berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan data. Pesan: ' . $e->getMessage());
        }
    }


    public function update(Request $request, Role $role)
    {
        try {

            $validated = $request->validate([
                'name' => 'required'
            ]);

            $role->update($validated);

            return redirect()->back()->with('success', 'role updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $role = Role::findOrFail($id);
            $role->delete();

            return response()->json([
                'success' => true,
                'message' => 'Role berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus role.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
