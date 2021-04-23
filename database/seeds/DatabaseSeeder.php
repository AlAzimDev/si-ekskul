<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User Admin
        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('secret123'),
            'password2' => 'secret123',
            'role' => 2,
            'created_at' => Carbon::now()->subMonths(4),
            'updated_at' => Carbon::now()->subMonths(4),
        ]);
        // User Petugas
        DB::table('users')->insert([
            'name' => 'Petugas Satu',
            'email' => 'petugas1@gmail.com',
            'password' => Hash::make('secret123'),
            'password2' => 'secret123',
            'role' => 1,
            'created_at' => Carbon::now()->subMonths(3),
            'updated_at' => Carbon::now()->subMonths(3),
        ]);
        DB::table('users')->insert([
            'name' => 'Petugas Dua',
            'email' => 'petugas2@gmail.com',
            'password' => Hash::make('secret123'),
            'password2' => 'secret123',
            'role' => 1,
            'created_at' => Carbon::now()->subMonths(3),
            'updated_at' => Carbon::now()->subMonths(3),
        ]);
        DB::table('users')->insert([
            'name' => 'Petugas Tiga',
            'email' => 'petugas3@gmail.com',
            'password' => Hash::make('secret123'),
            'password2' => 'secret123',
            'role' => 1,
            'created_at' => Carbon::now()->subMonths(1),
            'updated_at' => Carbon::now()->subMonths(1),
        ]);
        // User Siswa
        DB::table('users')->insert([
            'name' => 'Siswa Satu',
            'email' => 'siswa1@gmail.com',
            'password' => Hash::make('secret123'),
            'password2' => 'secret123',
            'role' => 0,
            'created_at' => Carbon::now()->subMonths(4),
            'updated_at' => Carbon::now()->subMonths(4),
        ]);
        DB::table('users')->insert([
            'name' => 'Siswa Dua',
            'email' => 'siswa2@gmail.com',
            'password' => Hash::make('secret123'),
            'password2' => 'secret123',
            'role' => 0,
            'created_at' => Carbon::now()->subMonths(4),
            'updated_at' => Carbon::now()->subMonths(4),
        ]);
        DB::table('users')->insert([
            'name' => 'Siswa Tiga',
            'email' => 'siswa3@gmail.com',
            'password' => Hash::make('secret123'),
            'password2' => 'secret123',
            'role' => 0,
            'created_at' => Carbon::now()->subMonths(3),
            'updated_at' => Carbon::now()->subMonths(3),
        ]);
        DB::table('users')->insert([
            'name' => 'Siswa Empat',
            'email' => 'siswa4@gmail.com',
            'password' => Hash::make('secret123'),
            'password2' => 'secret123',
            'role' => 0,
            'created_at' => Carbon::now()->subMonths(1),
            'updated_at' => Carbon::now()->subMonths(1),
        ]);
        DB::table('users')->insert([
            'name' => 'Siswa Lima',
            'email' => 'siswa5@gmail.com',
            'password' => Hash::make('secret123'),
            'password2' => 'secret123',
            'role' => 0,
            'created_at' => Carbon::now()->subMonths(1),
            'updated_at' => Carbon::now()->subMonths(1),
        ]);
        DB::table('users')->insert([
            'name' => 'Siswa Enam',
            'email' => 'siswa6@gmail.com',
            'password' => Hash::make('secret123'),
            'password2' => 'secret123',
            'role' => 0,
            'created_at' => Carbon::now()->subMonths(1),
            'updated_at' => Carbon::now()->subMonths(1),
        ]);
        // data siswa
        DB::table('data_siswas')->insert([
            'nama_lengkap' => 'Siswa Satu',
            'nama_panggilan' => 'Satu',
            'jenis_kelamin' => 'll',
            'tempat_lahir' => 'Mungka',
            'tanggal_lahir' => Carbon::now()->subYears(16),
            'alamat' => 'Padang',
            'handphone' => '085156055275',
            'id_soal' => null,
            'id_user' => 5,
            'created_at' => Carbon::now()->subMonths(4),
            'updated_at' => Carbon::now()->subMonths(4),
        ]);
        DB::table('data_siswas')->insert([
            'nama_lengkap' => 'Siswa Dua',
            'nama_panggilan' => 'Dua',
            'jenis_kelamin' => 'p',
            'tempat_lahir' => 'Mungka',
            'tanggal_lahir' => Carbon::now()->subYears(16),
            'alamat' => 'Padang',
            'handphone' => '085156055275',
            'id_soal' => null,
            'id_user' => 6,
            'created_at' => Carbon::now()->subMonths(4),
            'updated_at' => Carbon::now()->subMonths(4),
        ]);
        DB::table('data_siswas')->insert([
            'nama_lengkap' => 'Siswa Tiga',
            'nama_panggilan' => 'Tiga',
            'jenis_kelamin' => 'p',
            'tempat_lahir' => 'Mungka',
            'tanggal_lahir' => Carbon::now()->subYears(16),
            'alamat' => 'Padang',
            'handphone' => '085156055275',
            'id_soal' => null,
            'id_user' => 7,
            'created_at' => Carbon::now()->subMonths(3),
            'updated_at' => Carbon::now()->subMonths(3),
        ]);
        DB::table('data_siswas')->insert([
            'nama_lengkap' => 'Siswa Empat',
            'nama_panggilan' => 'Empat',
            'jenis_kelamin' => 'll',
            'tempat_lahir' => 'Mungka',
            'tanggal_lahir' => Carbon::now()->subYears(16),
            'alamat' => 'Padang',
            'handphone' => '085156055275',
            'id_soal' => null,
            'id_user' => 8,
            'created_at' => Carbon::now()->subMonths(1),
            'updated_at' => Carbon::now()->subMonths(1),
        ]);
        DB::table('data_siswas')->insert([
            'nama_lengkap' => 'Siswa Lima',
            'nama_panggilan' => 'Lima',
            'jenis_kelamin' => 'll',
            'tempat_lahir' => 'Mungka',
            'tanggal_lahir' => Carbon::now()->subYears(16),
            'alamat' => 'Padang',
            'handphone' => '085156055275',
            'id_soal' => null,
            'id_user' => 9,
            'created_at' => Carbon::now()->subMonths(1),
            'updated_at' => Carbon::now()->subMonths(1),
        ]);
        DB::table('data_siswas')->insert([
            'nama_lengkap' => 'Siswa Enam',
            'nama_panggilan' => 'Enam',
            'jenis_kelamin' => 'p',
            'tempat_lahir' => 'Mungka',
            'tanggal_lahir' => Carbon::now()->subYears(16),
            'alamat' => 'Padang',
            'handphone' => '085156055275',
            'id_soal' => null,
            'id_user' => 10,
            'created_at' => Carbon::now()->subMonths(1),
            'updated_at' => Carbon::now()->subMonths(1),
        ]);
    }
}
