<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Mahasiswas')->insert([
            [
                'NPM' => '18429090',
                'NAMA' => 'CANTIK JELITA',
                'PRODI' => 'TI',
                'TAHUNMASUK' => 2018,
                'CREATED_AT' => '2020-04-08 21:21:23',
                'UPDATED_AT' => NULL,
            ],
            [
                'NPM' => '18428090',
                'NAMA' => 'GANTENG MAKSIMAL',
                'PRODI' => 'SI',
                'TAHUNMASUK' => 2018,
                'CREATED_AT' => '2020-04-08 21:21:23',
                'UPDATED_AT' => NULL,
            ],
            [
                'NPM' => '18326090',
                'NAMA' => 'CETAR MEMBAHANA',
                'PRODI' => 'MI',
                'TAHUNMASUK' => 2018,
                'CREATED_AT' => '2020-04-08 21:21:23',
                'UPDATED_AT' => NULL,
            ],
            [
                'NPM' => '18327090',
                'NAMA' => 'GLOWING',
                'PRODI' => 'KA',
                'TAHUNMASUK' => 2018,
                'CREATED_AT' => '2020-04-08 21:21:23',
                'UPDATED_AT' => NULL,
            ],
        ]);
    }
}


