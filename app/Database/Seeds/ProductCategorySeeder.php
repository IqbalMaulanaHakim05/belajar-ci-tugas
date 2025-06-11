<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    public function run()
    {
        // membuat data kategori
        $data = [
            [
                'name' => 'Laptop',
                'description' => 'Kategori untuk berbagai jenis laptop.',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'name' => 'Aksesoris',
                'description' => 'Kategori untuk aksesoris komputer seperti mouse, keyboard, dan headset.',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'name' => 'Komponen',
                'description' => 'Kategori untuk komponen PC seperti motherboard, RAM, dan power supply.',
                'created_at' => date("Y-m-d H:i:s"),
            ],
        ];

        foreach ($data as $item) {
            // insert semua data ke tabel product_category
            $this->db->table('product_category')->insert($item);
        }
    }
}
