<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()->data1()->create();
        Product::factory()->data2()->create();
        Product::factory()->data3()->create();
        Product::factory()->data4()->create();
        Product::factory()->data5()->create();
        Product::factory()->data6()->create();
        Product::factory()->data7()->create();
        Product::factory()->data8()->create();
        Product::factory()->data9()->create();
        Product::factory()->data10()->create();
        Product::factory()->data11()->create();
        Product::factory()->data12()->create();
        Product::factory()->data13()->create();
        Product::factory()->data14()->create();
        Product::factory()->data15()->create();
        Product::factory()->data16()->create();
        Product::factory()->data17()->create();
        Product::factory()->data18()->create();
        Product::factory()->data19()->create();
        Product::factory()->data20()->create();
    }
}
