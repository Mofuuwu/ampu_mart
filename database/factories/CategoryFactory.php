<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        ];
    }
    public function data1()
    {
        return $this->state([
            'id' => 1, // id diubah menjadi integer
            'name' => 'Beras',
        ]);
    }

    public function data2()
    {
        return $this->state([
            'id' => 2, // id diubah menjadi integer
            'name' => 'Minyak',
        ]);
    }

    public function data3()
    {
        return $this->state([
            'id' => 3, // id diubah menjadi integer
            'name' => 'Gula',
        ]);
    }

    public function data4()
    {
        return $this->state([
            'id' => 4, // id diubah menjadi integer
            'name' => 'Teh',
        ]);
    }

    public function data5()
    {
        return $this->state([
            'id' => 5, // id diubah menjadi integer
            'name' => 'Tepung',
        ]);
    }

    public function data6()
    {
        return $this->state([
            'id' => 6, // id diubah menjadi integer
            'name' => 'Kopi',
        ]);
    }

    public function data7()
    {
        return $this->state([
            'id' => 7, // id diubah menjadi integer
            'name' => 'Mie Instan',
        ]);
    }

    public function data8()
    {
        return $this->state([
            'id' => 8, // id diubah menjadi integer
            'name' => 'Susu',
        ]);
    }

    public function data9()
    {
        return $this->state([
            'id' => 9, // id diubah menjadi integer
            'name' => 'Kecap',
        ]);
    }

    public function data10()
    {
        return $this->state([
            'id' => 10, // id diubah menjadi integer
            'name' => 'Saus',
        ]);
    }
}
