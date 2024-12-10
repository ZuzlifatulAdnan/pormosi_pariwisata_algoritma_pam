<?php

namespace Database\Seeders;

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
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                // 'role' => 'Admin',
                'password' => Hash::make('12345678'),
                'created_at' => date('Y-m-d H:i:s')
            ],
        ]);
        DB::table(table: 'activities')->insert([
            ['nama' => 'Main'],
            ['nama' => 'Belajar'],
        ]);
        DB::table('reviews')->insert([
            ['nama' => 'John Doe', 'jumlah_pengunjung' => 5, 'asal_pengunjung' => 'Jakarta', 'activity_id' => 1, 'review_pengunjung' => 'Very good activity'],
            ['nama' => 'Jane Smith', 'jumlah_pengunjung' => 3, 'asal_pengunjung' => 'Bandung', 'activity_id' => 1, 'review_pengunjung' => 'Great experience'],
            ['nama' => 'Alice Brown', 'jumlah_pengunjung' => 2, 'asal_pengunjung' => 'Surabaya', 'activity_id' => 2, 'review_pengunjung' => 'Not bad'],
        ]);
        // $this->call([
        //     UsersSeeder::class,
        // ]);
    }
}
