<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->insert([
            'nama' => 'Abdul Halim', // phpcs:ignore ..DetectWeakValidation.Found
            'jeniskelamin' => 'Pria',
            'umur' => '20',
            'alamat' => 'Terusan',
            'kontak' => '0812817837',
            'upah' => '1000000000',
            'status' => 'Aktif',
           ]);
    }
}
