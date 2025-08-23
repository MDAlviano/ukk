<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'full_name' => 'Alviano',
            'email' => 'falzlux06@gmail.com',
            'password_hash' => 'initidakdihash',
            'role' => 'superadmin',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
