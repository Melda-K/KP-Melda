<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class siswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('siswas')->insert(
            [
                //Kelas1
                [
                    "nis" => "3163285193 / 232401026",
                    "nama_siswa" => "Muhammad Irfan Hakim",
                    "kelas" => "I",
                    "tahun_pelajaran" =>"L",
                ],
                [
                    "nis" => "3167280726 / 232401031",
                    "nama_siswa" => "Quthbi Hafy Sirojudin Al Birunni",
                    "kelas" => "I",
                    "tahun_pelajaran" =>"L",
                ],
                [
                    "nis" => "3164904203 / 232401039",
                    "nama_siswa" => "Siti Nuraeni",
                    "kelas" => "I",
                    "tahun_pelajaran" =>"P",
                ],
                
                //Kelas2
                [
                    "nis" => "3161921685 / 222301001",
                    "nama_siswa" => "Adeeva Shakila Faiha",
                    "kelas" => "II",
                    "tahun_pelajaran" =>"P",
                ],
                [
                    "nis" => "3151206330 / 222301037",
                    "nama_siswa" => "Putri Asani  Zahratunida",
                    "kelas" => "II",
                    "tahun_pelajaran" =>"P",
                ],
                [
                    "nis" => "3150251218 / 222301031",
                    "nama_siswa" => "Muhammad Aqil Sya'bana",
                    "kelas" => "II",
                    "tahun_pelajaran" =>"L",
                ],

                 //Kelas3
                 [
                    "nis" => "0144111323 / 212201022 ",
                    "nama_siswa" => "Mia Umiatul Gina",
                    "kelas" => "III",
                    "tahun_pelajaran" =>"P",
                ],
                [
                    "nis" => "3167280726 / 232401031",
                    "nama_siswa" => "Salsabila Putri Aswan",
                    "kelas" => "III",
                    "tahun_pelajaran" =>"P",
                ],
                [
                    "nis" => "3164904203 / 232401039",
                    "nama_siswa" => "Kaipa Tiljalah",
                    "kelas" => "III",
                    "tahun_pelajaran" =>"P",
                ],

                //Kelas4
                [
                    "nis" => "0139604544 / ",
                    "nama_siswa" => "Syifa Fitri Agustini",
                    "kelas" => "IV",
                    "tahun_pelajaran" =>"P",
                ],
                [
                    "nis" => "3133503615 / 202101002",
                    "nama_siswa" => "Aqila Putri",
                    "kelas" => "IV",
                    "tahun_pelajaran" =>"P",
                ],
                [
                    "nis" => "0137312128 / ",
                    "nama_siswa" => "Siska Ramadani Putri",
                    "kelas" => "IV",
                    "tahun_pelajaran" =>"P",
                ],
                
                //Kelas5
                [
                    "nis" => "0125483255 / 192001050 ",
                    "nama_siswa" => "Siti Rahmah Nuranjani",
                    "kelas" => "V",
                    "tahun_pelajaran" =>"P",
                ],
                [
                    "nis" => "3131605440 / 192001008 ",
                    "nama_siswa" => "Dela Sukma Alisa",
                    "kelas" => "V",
                    "tahun_pelajaran" =>"P",
                ],
                [
                    "nis" => "3124589648 / 192001024 ",
                    "nama_siswa" => "Maya Chyani",
                    "kelas" => "V",
                    "tahun_pelajaran" =>"P",
                ],

                //Kelas6
                [
                    "nis" => "0129368275 / 181901008 ",
                    "nama_siswa" => "Iis Siti Salmah",
                    "kelas" => "VI",
                    "tahun_pelajaran" =>"P",
                ],
                [
                    "nis" => "0124276827 / 181901036 ",
                    "nama_siswa" => "Sakila",
                    "kelas" => "VI",
                    "tahun_pelajaran" =>"P",
                ],
                [
                    "nis" => "0117183274 / 181901039 ",
                    "nama_siswa" => "Selpi Asanti",
                    "kelas" => "VI",
                    "tahun_pelajaran" =>"P",
                ],  
            ]
        );
    }
}
