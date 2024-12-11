<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JadwalMengajar;

class JadwalMengajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JadwalMengajar::create([
            'kode_kelas' => 'IF101',
            'mata_kuliah' => 'Algoritma dan Pemrograman',
            'jadwal' => 'Senin, 08:00 - 10:00',
            'ruangan' => 'Ruang 101',
        ]);
    JadwalMengajar::create([
        'kode_kelas' => 'IF102',
        'mata_kuliah' => 'Struktur Data',
        'jadwal' => 'Selasa, 10:00 - 12:00',
        'ruangan' => 'Ruang 102',
    ]);

    JadwalMengajar::create([
        'kode_kelas' => 'IF103',
        'mata_kuliah' => 'Basis Data',
        'jadwal' => 'Rabu, 08:00 - 10:00',
        'ruangan' => 'Ruang 103',
    ]);

    JadwalMengajar::create([
        'kode_kelas' => 'IF104',
        'mata_kuliah' => 'Pemrograman Web',
        'jadwal' => 'Kamis, 10:00 - 12:00',
        'ruangan' => 'Ruang 104',
    ]);

    JadwalMengajar::create([
        'kode_kelas' => 'IF105',
        'mata_kuliah' => 'Jaringan Komputer',
        'jadwal' => 'Jumat, 08:00 - 10:00',
        'ruangan' => 'Ruang 105',
    ]);

    JadwalMengajar::create([
        'kode_kelas' => 'IF106',
        'mata_kuliah' => 'Sistem Operasi',
        'jadwal' => 'Senin, 10:00 - 12:00',
        'ruangan' => 'Ruang 106',
    ]);

    JadwalMengajar::create([
        'kode_kelas' => 'IF107',
        'mata_kuliah' => 'Kecerdasan Buatan',
        'jadwal' => 'Selasa, 08:00 - 10:00',
        'ruangan' => 'Ruang 107',
    ]);

    JadwalMengajar::create([
        'kode_kelas' => 'IF108',
        'mata_kuliah' => 'Pemrograman Mobile',
        'jadwal' => 'Rabu, 10:00 - 12:00',
        'ruangan' => 'Ruang 108',
    ]);

    JadwalMengajar::create([
        'kode_kelas' => 'IF109',
        'mata_kuliah' => 'Keamanan Jaringan',
        'jadwal' => 'Kamis, 08:00 - 10:00',
        'ruangan' => 'Ruang 109',
    ]);

    JadwalMengajar::create([
        'kode_kelas' => 'IF110',
        'mata_kuliah' => 'Manajemen Proyek',
        'jadwal' => 'Jumat, 10:00 - 12:00',
        'ruangan' => 'Ruang 110',
    ]);
    }
}
