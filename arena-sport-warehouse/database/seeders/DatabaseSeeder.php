<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('users')->insert([
            'full_name' => 'Alviano',
            'email' => 'falzlux06@gmail.com',
            'password_hash' => Hash::make('initidakdihash'),
            'role' => 'admin',
            'phone' => '0812345678',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
