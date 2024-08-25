<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pekerjaan = [
            'PNS',
            'TNI',
            'POLRI',
            'Pegawai Swasta',
            'Wiraswasta',
            'Petani',
            'Nelayan',
            'Buruh',
            'Lainnya',
        ];

        foreach ($pekerjaan as $pekerjaan) {
            \App\Models\Pekerjaan::create([
                'nama' => $pekerjaan,
            ]);
        }
    }
}
