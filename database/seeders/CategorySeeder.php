<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->data1()->create();
        Category::factory()->data2()->create();
        Category::factory()->data3()->create();
        Category::factory()->data4()->create();
        Category::factory()->data5()->create();
        Category::factory()->data6()->create();
        Category::factory()->data7()->create();
        Category::factory()->data8()->create();
        Category::factory()->data9()->create();
        Category::factory()->data10()->create();
    }
}
