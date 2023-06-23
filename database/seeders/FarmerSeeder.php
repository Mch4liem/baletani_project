<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FarmerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('farmers')->insert([
        'nama' => 'Abdul Halim', // phpcs:ignore ..DetectWeakValidation.Found
        'jeniskelamin' => 'Pria',
        'umur' => '20',
        'alamat' => 'Terusan',
        'kontak' => '0812817837',
        'upah' => '1000000000',
       ]);
    }
}
