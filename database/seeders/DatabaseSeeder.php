<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Menggunakan updateOrCreate agar jika email smak@admin.com sudah ada, 
        // data lainnya akan diupdate dan tidak menyebabkan error Duplicate Entry.
        User::updateOrCreate(
            ['email' => 'smak@admin.com'], // Kondisi pencarian (Unique Key)
            [
                'name' => 'SMAK SEMINARI YOHANES PENGINJIL ASMAT',
                'password' => Hash::make('password123'), // Jangan lupa tambahkan password jika manual
                'email_verified_at' => now(),
            ]
        );

        $this->call([
            SchoolDataSeeder::class,
        ]);
    }
}