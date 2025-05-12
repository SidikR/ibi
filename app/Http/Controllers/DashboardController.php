<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $role = roleName();
        $validRoles = ['superadmin', 'petugas', 'anggota'];

        if (!in_array($role, $validRoles)) {
            abort(500);  // Role tidak ditemukan
        }

        // Mengarahkan ke view yang sesuai
        return view('role.dashboard');
    }
}
