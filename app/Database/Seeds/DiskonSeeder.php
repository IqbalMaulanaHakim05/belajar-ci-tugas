<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DiskonSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        $hari_ini = date('Y-m-d');

        $useddate = [];

        for ($i = 0; $i < 10; $i++) {
            $currentDate = date('Y-m-d', strtotime($hari_ini . ' + ' . $i . 'days'));
            while (in_array($currentDate, $useddate)) {
                $i++;
                $currentDate = date('Y-m-d', strtotime($hari_ini . ' + ' . $i . 'days'));
            }
            $useddate[] = $currentDate;
            $data = [
                'tanggal' => $currentDate,
                'nominal' => $faker->randomElement([100000, 200000, 300000]),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ];
            $this->db->table('diskon')->insert($data);
        }
    }
}
