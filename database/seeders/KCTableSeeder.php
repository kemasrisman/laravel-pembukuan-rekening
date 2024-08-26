<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KCTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cabang = [
            'KCP Surabaya',
            'KCP Jakarta',
            'KCP Bandung',
            'KCP Semarang',
        ];

        foreach ($cabang as $cabang) {
            \App\Models\KantorCabang::create([
                'nama' => $cabang,
                'alamat' => 'Jl. Jalan',
            ]);
        }
    }
}
