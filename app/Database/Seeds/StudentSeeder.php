<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name'   => 'Jaypee Kyle Alsagon',
                'email'  => '423003306@ntc.edu.ph',
                'course' => 'Information Technology',
            ],
            [
                'name'   => 'Maverick Intong',
                'email'  => '422000000@ntc.edu.ph',
                'course' => 'Information Technology',
            ],
            [
                'name'   => 'Deivid Yap',
                'email'  => '423000000@ntc.edu.ph',
                'course' => 'Information Technology',
            ],
        ];

        // Using Query Builder to insert data
    }
}