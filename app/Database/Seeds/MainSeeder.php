<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MainSeeder extends Seeder
{
    public function run()
    {
        // 1. Isi Data Regions (Pusat, Cabang, Tambang 1-6)
        $regions = [
            ['name' => 'Kantor Pusat'],
            ['name' => 'Kantor Cabang'],
            ['name' => 'Tambang Lokasi 1'],
            ['name' => 'Tambang Lokasi 2'],
            ['name' => 'Tambang Lokasi 3'],
            ['name' => 'Tambang Lokasi 4'],
            ['name' => 'Tambang Lokasi 5'],
            ['name' => 'Tambang Lokasi 6'],
        ];
        $this->db->table('regions')->insertBatch($regions);

        // 2. Isi Data Users (Admin & Penyetuju)
        $users = [
            [
                'username' => 'admin_pool',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'role'     => 'admin',
                'level'    => null
            ],
            [
                'username' => 'atasan_satu',
                'password' => password_hash('atasan123', PASSWORD_DEFAULT),
                'role'     => 'approver',
                'level'    => 1
            ],
            [
                'username' => 'atasan_dua',
                'password' => password_hash('atasan123', PASSWORD_DEFAULT),
                'role'     => 'approver',
                'level'    => 2
            ],
        ];
        $this->db->table('users')->insertBatch($users);

        // 3. Isi Data Kendaraan (Contoh Kendaraan Milik & Sewa)
        $vehicles = [
            [
                'model' => 'Toyota Avanza',
                'plate_number' => 'B 1234 ABC',
                'type' => 'Orang',
                'ownership' => 'Perusahaan',
                'region_id' => 1
            ],
            [
                'model' => 'Mitsubishi Triton',
                'plate_number' => 'L 9988 XYZ',
                'type' => 'Barang',
                'ownership' => 'Sewa',
                'region_id' => 3
            ],
        ];
        $this->db->table('vehicles')->insertBatch($vehicles);
    }
}