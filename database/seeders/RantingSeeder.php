<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RantingSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('rantings')->insert([
            ['name' => 'Ranting A', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ranting B', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ranting C', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
