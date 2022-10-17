<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\SaledProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaledProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 30; $i++) {

            $collection  = Product::all()->random();
            $id          = $collection->id;
            $price       = $collection->price;
            $amount      = rand(1,5);
            $total       = $price * $amount;

            SaledProduct::create([
                'product_id'    => $id,
                'amount'        => $amount,
                'total'         => $total,
                'order_id'       => Order::all()->random()->id,
            ]);
        }
    }
}
