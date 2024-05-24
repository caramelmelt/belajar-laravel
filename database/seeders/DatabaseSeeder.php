<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\inventaris;
use App\Models\Category;
use App\Models\Role;
use App\Models\Permintaan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //USER SEEDER
        User::create([
            'name' => 'Ajeng Kalista Rahma',
            'username' => 'jeje',
            'email' => 'ajengkalista08@gmail.com',
            'password' => bcrypt('12345'),
            'jabatan' => 'HRD',
            'role_id' => '1'
        ]);
        User::create([
            'name' => 'Alda Putri',
            'username' => 'alda',
            'email' => 'alda0@gmail.com',
            'password' => bcrypt('12345'),
            'jabatan' => 'Karyawan',
            'role_id' => '2'
        ]);
        User::create([
            'name' => 'Wijaya Kusuma',
            'username' => 'wijaya',
            'email' => 'wijaya@gmail.com',
            'password' => bcrypt('12345'),
            'jabatan' => 'Pemimpin',
            'role_id' => '3'
        ]);
        User::create([
            'name' => 'Divisi Kepegawaian',
            'username' => 'kepegawaian',
            'email' => 'kepegawaian@gmail.com',
            'password' => bcrypt('12345'),
            'jabatan' => 'Divisi Kepegawaian',
            'role_id' => '2'
        ]);


        //CATEGORIES INVENTARIS
        Category::create([
            'name' => 'Komputer dan Teknologi'
        ]);
        Category::create([
            'name' => 'Umum'
        ]);
        Category::create([
            'name' => 'Elektronik'
        ]);
        Category::create([
            'name' => 'Alat Tulis Kantor'
        ]);

        //INVENTARIS SEEDER
        //tabel inventaris
        inventaris::create([
            'category_id' => '2',
            'users_id' => '1',
            'kode_barang' => 'AB001',
            'nama_barang' => 'Kursi kantor tipe A',
            'jumlah' => '1',
            'tgl_akuisisi' => '2024-12-08',
            'status' => 'Digunakan',
        ]);
        inventaris::create([
            'category_id' => '1',
            'users_id' => '4',
            'kode_barang' => 'L023I',
            'nama_barang' => 'Personal Computer Lenovo i7',
            'jumlah' => '10',
            'tgl_akuisisi' => '2024-12-08',
            'status' => 'Proses Pengadaan',
        ]);

        //ROLE SEEDER
        Role::create([
            'level' => 'Admin'
        ]);
        Role::create([
            'level' => 'Karyawan'
        ]);
        Role::create([
            'level' => 'Pemimpin'
        ]);

        //Permintaan Seeder
        Permintaan::create([
            'users_id' => '3',
            'nama_barang' => 'Printer Epson',
            'jumlah' => '1',
            'alasan' => 'Kerusakan'
        ]);
    }

    
}
