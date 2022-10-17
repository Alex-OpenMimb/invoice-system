<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < count(Product::PRODUCTS); $i++) {
            Product::create([
                'reference'     => 'REF'.rand(1000, 200000),
                'name'          => Product::PRODUCTS[$i],
                'price'         => rand(1000, 200000),
            ]);
        }
    }
}
