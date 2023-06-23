<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RentalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rentals')->insert([
            'username' => 'Abdul Halim', // phpcs:ignore ..DetectWeakValidation.Found
            'waktu' => '2023-03-21',
            'tujuan' => 'Karangampel',
           ]);
    }
}
