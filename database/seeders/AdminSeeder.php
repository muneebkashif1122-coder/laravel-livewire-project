<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
        'email' => 'muneebkashif@gmail.com', // Replace with your admin email
        'password' => Hash::make('112233'), // Encripted safely!
    ]);
    }
}
