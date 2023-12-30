<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subjects')->insert([

            [
                'name' => 'Bangla',
            ],
            [
                'name' => 'English',
            ],
            [
                'name' => 'Math',
            ],
            [
                'name' => 'ICT',
            ],
            [
                'name' => 'Islam',
            ],
            [
                'name' => 'Physics',
            ],
            [
                'name' => 'Chemestry',
            ],
            [
                'name' => 'Higher Math',
            ],
            [
                'name' => 'Global Studies',
            ],
            [
                'name' => 'Bangladesh Studies',
            ]
        ]);
    }
}
