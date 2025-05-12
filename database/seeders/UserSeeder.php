<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\Ranting;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil ID Role
        $anggotaRoleId = DB::table('roles')->where('name', 'anggota')->value('id');
        $petugasRoleId = DB::table('roles')->where('name', 'petugas')->value('id');
        $superadminRoleId = DB::table('roles')->where('name', 'superadmin')->value('id');

        // Ambil satu ranting (opsional)
        $rantingId = DB::table('rantings')->where('name', 'Ranting A')->value('id');

        DB::table('users')->insert([
            [
                'name' => 'User Anggota',
                'email' => 'anggota@example.com',
                'no_kta' => '1',
                'password' => Hash::make('anggota1'),
                'role_id' => $anggotaRoleId,
                'ranting_id' => $rantingId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User Anggota',
                'email' => 'anggota2@example.com',
                'no_kta' => '12',
                'password' => Hash::make('anggota2'),
                'role_id' => $anggotaRoleId,
                'ranting_id' => $rantingId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User Petugas',
                'email' => 'petugas@example.com',
                'no_kta' => '2',
                'password' => Hash::make('petugas1'),
                'role_id' => $petugasRoleId,
                'ranting_id' => $rantingId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User Superadmin',
                'email' => 'superadmin@example.com',
                'no_kta' => '3',
                'password' => Hash::make('superadmin'),
                'role_id' => $superadminRoleId,
                'ranting_id' => null, // superadmin tidak terikat ranting
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
