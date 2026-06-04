<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Admin Default
        User::create([
            'nama' => 'Administrator',
            'username' => 'admin',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);

        // Seeder Master Data
        $this->call([
            KategoriObatSeeder::class,
            ObatSeeder::class,
        ]);
    }
}