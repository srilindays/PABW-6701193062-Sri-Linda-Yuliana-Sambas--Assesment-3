<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use CodeIgniter\I18n\Time;

class trainerSeeder extends Seeder
{
    public function run()
    {
        // $data = [
        //     [
        //         'nama'          => 'Sri Linda',
        //         'alamat'        => 'Jl. abc N0.30 Bandung',
        //         'jenis_kelamin' => 'perempuan',
        //         'create_at'     => Time::now(),
        //         'updated_at'    => Time::now()
        //     ],
        //     [
        //         'nama'          => 'Abdiel',
        //         'alamat'        => 'Jl. ghi N0.30 Bandung',
        //         'jenis_kelamin' => 'Laki-laki',
        //         'create_at'     => Time::now(),
        //         'updated_at'    => Time::now()
        //     ],
        //     [
        //         'nama'          => 'Abhista',
        //         'alamat'        => 'Jl. def N0.30 Bandung',
        //         'jenis_kelamin' => 'Laki-laki',
        //         'create_at'     => Time::now(),
        //         'updated_at'    => Time::now()
        //     ]
        // ];


        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 20; $i++) {

            $data = [
                'nama'          => $faker->name,
                'alamat'        => $faker->address,
                'jenis_kelamin' => 'Laki-laki',
                'create_at'     => Time::createFromTimestamp($faker->unixTime()),
                'updated_at'    => Time::now()
            ];
            $this->db->table('trainer')->insert($data);
        }

        // Simple Queries
        // $this->db->query(
        //     "INSERT INTO trainer (nama, alamat, jenis_kelamin, create_at, updated_at) VALUES(:nama:, :alamat:, :jenis_kelamin:, :create_at:, :updated_at:)",
        //     $data
        // );

        // Using Query Builder
        // $this->db->table('trainer')->insert($data);
    }
}
