<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class mataPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mata_pelajarans')->insert(
            [
                [
                    'nama_mata_pelajaran' => 'Pendidikan Agama dan Budi Pekerti',
                    'nilai' => '',
                    'huruf' => '',
                ],
                [
                    'nama_mata_pelajaran' => 'PKN',
                    'nilai' => '',
                    'huruf' => '',
                ],
                [
                    'nama_mata_pelajaran' => 'Bahasa Indonesia',
                    'nilai' => '',
                    'huruf' => '',
                ],
                [
                    'nama_mata_pelajaran' => 'Matematika',
                    'nilai' => '',
                    'huruf' => '',
                ],
                [
                    'nama_mata_pelajaran' => 'IPA',
                    'nilai' => '',
                    'huruf' => '',
                ],
                [
                    'nama_mata_pelajaran' => 'IPS',
                    'nilai' => '',
                    'huruf' => '',
                ],
                [
                    'nama_mata_pelajaran' => 'PJOK',
                    'nilai' => '',
                    'huruf' => '',
                ],
                [
                    'nama_mata_pelajaran' => 'Seni Budaya',
                    'nilai' => '',
                    'huruf' => '',
                ],
                [
                    'nama_mata_pelajaran' => 'Basa Sunda',
                    'nilai' => '',
                    'huruf' => '',
                ],
                [
                    'nama_mata_pelajaran' => 'Bahasa Inggris',
                    'nilai' => '',
                    'huruf' => '',
                ],
            ]
        );
    }
}
