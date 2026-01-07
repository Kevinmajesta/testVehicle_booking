<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MainSeeder extends Seeder
{
    public function run()
    {
        $regions = [
            ['name' => 'Kantor Pusat - Jakarta'],
            ['name' => 'Kantor Cabang - Surabaya'],
            ['name' => 'Tambang Lokasi 1 (Site A)'],
            ['name' => 'Tambang Lokasi 2 (Site B)'],
            ['name' => 'Tambang Lokasi 3 (Site C)'],
            ['name' => 'Tambang Lokasi 4 (Site D)'],
            ['name' => 'Tambang Lokasi 5 (Site E)'],
            ['name' => 'Tambang Lokasi 6 (Site F)'],
        ];
        $this->db->table('regions')->insertBatch($regions);

        $users = [
            [
                'username' => 'ahmad_admin', 
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'role'     => 'admin',
                'level'    => null
            ],
            [
                'username' => 'bambang_setiawan', 
                'password' => password_hash('atasan123', PASSWORD_DEFAULT),
                'role'     => 'approver',
                'level'    => 1
            ],
            [
                'username' => 'citra_lestari',
                'password' => password_hash('atasan123', PASSWORD_DEFAULT),
                'role'     => 'approver',
                'level'    => 2
            ],
            [
                'username' => 'dedi_kurniawan', 
                'password' => password_hash('atasan123', PASSWORD_DEFAULT),
                'role'     => 'approver',
                'level'    => 1
            ],
        ];
        $this->db->table('users')->insertBatch($users);

        $vehicles = [
            [
                'model' => 'Toyota Avanza Veloz',
                'plate_number' => 'B 2134 SKW',
                'type' => 'Orang',
                'ownership' => 'Perusahaan',
                'region_id' => 1
            ],
            [
                'model' => 'Mitsubishi Triton 4x4',
                'plate_number' => 'L 8872 TX',
                'type' => 'Barang',
                'ownership' => 'Sewa',
                'region_id' => 3
            ],
            [
                'model' => 'Hino Ranger Dump Truck',
                'plate_number' => 'KT 4451 MN',
                'type' => 'Barang',
                'ownership' => 'Perusahaan',
                'region_id' => 4
            ],
        ];
        $this->db->table('vehicles')->insertBatch($vehicles);

        // 4. Isi Data Driver (Tambahan agar lebih lengkap)
        $drivers = [
            ['name' => 'Kevin Prasetyo', 'status' => 'Tersedia'],
            ['name' => 'Majesta Hidayat', 'status' => 'Tersedia'],
            ['name' => 'Ivano Saputra', 'status' => 'Tersedia'],
        ];
        $this->db->table('drivers')->insertBatch($drivers);
    }
}