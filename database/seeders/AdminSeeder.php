<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'username' => 'Abdul Halim', // phpcs:ignore ..DetectWeakValidation.Found
            'fullname' => 'Pria',
           ]);
    }
}
