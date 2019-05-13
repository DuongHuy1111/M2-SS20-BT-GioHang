<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product();
        $product->id = 1;
        $product->name = 'T-shirt';
        $product->price = '100000';
        $product->description = 'cotton';
        $product->quantity = '2';
        $product->produce = 'polo';
        $product->save();
    }
}
