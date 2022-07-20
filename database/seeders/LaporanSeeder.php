<?php

namespace Database\Seeders;

use App\Models\laporan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $laporan = [
            [
                'laporan' => 'Laporan 1',
                'area' => 'California',
                'tanggal' => '2022-05-01',
                'minyak' => '100',
                'non_minyak' => '200',
                'all' => '300',
            ],
            [
                'laporan' => 'Laporan 2',
                'area' => 'Colorado',
                'tanggal' => '2022-06-01',
                'minyak' => '100',
                'non_minyak' => '200',
                'all' => '300',
            ],
            [
                'laporan' => 'Laporan 3',
                'area' => 'California',
                'tanggal' => '2022-07-01',
                'minyak' => '100',
                'non_minyak' => '200',
                'all' => '300',
            ],
            [
                'laporan' => 'Laporan 4',
                'area' => 'Colorado',
                'tanggal' => '2022-08-01',
                'minyak' => '100',
                'non_minyak' => '200',
                'all' => '300',
            ],
            ];

            laporan::truncate();
            laporan::insert($laporan);
    }
}
