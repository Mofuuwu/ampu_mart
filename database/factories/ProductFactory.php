<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
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
            'id' => 1,
            'name' => 'Beras Merah 5kg',
            'description' => 'Beras merah kualitas premium, 5kg',
            'price' => 75000.00, // angka desimal
            'stock' => 50,
            'category_id' => 1, // Kategori Beras
            'image_url' => 'images/products/01JMBMN0C1TY53G7BS6HVT4Q29.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function data2()
    {
        return $this->state([
            'id' => 2,
            'name' => 'Beras Putih 5kg',
            'description' => 'Beras putih kualitas premium, 5kg',
            'price' => 70000.00, // angka desimal
            'stock' => 60,
            'category_id' => 1, // Kategori Beras
            'image_url' => 'images/products/01JMBMRXYSN3KHDP6EPK1AXP94.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function data3()
    {
        return $this->state([
            'id' => 3,
            'name' => 'Minyak Goreng 1L',
            'description' => 'Minyak goreng kemasan 1 liter',
            'price' => 15000.00, // angka desimal
            'stock' => 200,
            'category_id' => 2, // Kategori Minyak
            'image_url' => 'images/products/01JMBMXJSK0D71BYYNQ07C7PN8.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function data4()
    {
        return $this->state([
            'id' => 4,
            'name' => 'Minyak Goreng 2L',
            'description' => 'Minyak goreng kemasan 2 liter',
            'price' => 28000.00, // angka desimal
            'stock' => 120,
            'category_id' => 2, // Kategori Minyak
            'image_url' => 'images/products/01JMBMZ8TX6ZJTVY2Y4J9PHBKR.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function data5()
    {
        return $this->state([
            'id' => 5,
            'name' => 'Gula Pasir 1kg',
            'description' => 'Gula pasir putih 1kg',
            'price' => 12000.00, // angka desimal
            'stock' => 100,
            'category_id' => 3, // Kategori Gula
            'image_url' => 'images/products/01JMBN15ZT09GFYJMG9ZPKH7AV.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function data6()
    {
        return $this->state([
            'id' => 6,
            'name' => 'Teh Celup Sariwangi',
            'description' => 'Teh celup Sariwangi, 25 kantong',
            'price' => 18000.00, // angka desimal
            'stock' => 80,
            'category_id' => 4, // Kategori Teh
            'image_url' => 'images/products/01JMBN32TKSARG8X25R31V9P8G.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function data7()
    {
        return $this->state([
            'id' => 7,
            'name' => 'Tepung Terigu 1kg',
            'description' => 'Tepung terigu serbaguna 1kg',
            'price' => 10000.00, // angka desimal
            'stock' => 150,
            'category_id' => 5, // Kategori Tepung
            'image_url' => 'images/products/01JMBN5169P6GEBTQ3K9EBYACT.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function data8()
    {
        return $this->state([
            'id' => 8,
            'name' => 'Kopi Bubuk ABC 100g',
            'description' => 'Kopi bubuk ABC, 100g',
            'price' => 22000.00, // angka desimal
            'stock' => 60,
            'category_id' => 6, // Kategori Kopi
            'image_url' => 'images/products/01JMBN72JS320EZ1Y09XNHYT7T.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function data9()
    {
        return $this->state([
            'id' => 9,
            'name' => 'Mie Instan Indomie',
            'description' => 'Mie instan Indomie, 5 bungkus',
            'price' => 12000.00, // angka desimal
            'stock' => 300,
            'category_id' => 7, // Kategori Mie Instan
            'image_url' => 'images/products/01JMBN8KR67KMGRC5FJ7H5198S.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function data10()
    {
        return $this->state([
            'id' => 10,
            'name' => 'Mie Instan ABC',
            'description' => 'Mie instan ABC, 5 bungkus',
            'price' => 11000.00, // angka desimal
            'stock' => 250,
            'category_id' => 7, // Kategori Mie Instan
            'image_url' => 'images/products/01JMBNA2M2HF1TTW01SZ6AQ6YN.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    
    public function data11() {
        return $this->state([
            'id' => 11,
            'name' => 'Susu UHT Indomilk 1L',
            'description' => 'Susu UHT Indomilk 1 liter',
            'price' => 17000.00, // angka desimal
            'stock' => 120,
            'category_id' => 8, // Kategori Susu
            'image_url' => 'images/products/01JMBNBGE5PDK9SCC99YHK5PCW.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    
    public function data12() {
        return $this->state([
            'id' => 12,
            'name' => 'Kecap Manis Bango 500ml',
            'description' => 'Kecap manis Bango, 500ml',
            'price' => 25000.00, // angka desimal
            'stock' => 90,
            'category_id' => 9, // Kategori Kecap
            'image_url' => 'images/products/01JMBNCTJQQSM1NNHSPFHEJRGZ.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    
    public function data13() {
        return $this->state([
            'id' => 13,
            'name' => 'Saus Sambal ABC 250g',
            'description' => 'Saus sambal ABC, 250g',
            'price' => 13000.00, // angka desimal
            'stock' => 110,
            'category_id' => 10, // Kategori Saus
            'image_url' => 'images/products/01JMBNECDQC45ZK9C9MQHBK938.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    
    public function data14() {
        return $this->state([
            'id' => 14,
            'name' => 'Sereal Nestle Koko Crunch 200g',
            'description' => 'Sereal Nestle Koko Crunch, 200g',
            'price' => 35000.00, // angka desimal
            'stock' => 70,
            'category_id' => 11, // Kategori Sereal
            'image_url' => 'images/products/01JMBNFWGZT6CRH263APTGBE2T.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    
    public function data15() {
        return $this->state([
            'id' => 15,
            'name' => 'Tissue Ponds 100 lembar',
            'description' => 'Tissue Ponds 100 lembar',
            'price' => 8000.00, // angka desimal
            'stock' => 150,
            'category_id' => 12, // Kategori Tissue
            'image_url' => 'images/products/01JMBNHH03286GNG7WD7ZJQW5S.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    
    public function data16() {
        return $this->state([
            'id' => 16,
            'name' => 'Sabun Mandi Lifebuoy 100g',
            'description' => 'Sabun mandi Lifebuoy, 100g',
            'price' => 5000.00, // angka desimal
            'stock' => 200,
            'category_id' => 13, // Kategori Sabun
            'image_url' => 'images/products/01JMBNK76JHSNY3R02NN63XGTJ.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    
    public function data17() {
        return $this->state([
            'id' => 17,
            'name' => 'Detergen Rinso 500g',
            'description' => 'Detergen Rinso, 500g',
            'price' => 15000.00, // angka desimal
            'stock' => 150,
            'category_id' => 14, // Kategori Detergen
            'image_url' => 'images/products/01JMBNY4YTYYWA5MMEHWJMFXEB.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    
    public function data18() {
        return $this->state([
            'id' => 18,
            'name' => 'Kecap ABC 250ml',
            'description' => 'Kecap ABC, 250ml',
            'price' => 10000.00, // angka desimal
            'stock' => 140,
            'category_id' => 9, // Kategori Kecap
            'image_url' => 'images/products/01JMBP0MKPZHN6YTQQQ2WQAAVA.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    
    public function data19() {
        return $this->state([
            'id' => 19,
            'name' => 'Susu Full Cream 1L',
            'description' => 'Susu full cream 1 liter, kualitas terbaik',
            'price' => 22000.00, // angka desimal
            'stock' => 110,
            'category_id' => 8, // Kategori Susu
            'image_url' => 'images/products/01JMBP2AMNX5B5WSCW3YNMG698.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    
    public function data20() {
        return $this->state([
            'id' => 20,
            'name' => 'Mie Instan ABC Goreng',
            'description' => 'Mie instan ABC goreng, 5 bungkus',
            'price' => 12000.00, // angka desimal
            'stock' => 250,
            'category_id' => 7, // Kategori Mie Instan
            'image_url' => 'images/products/01JMBP3MMMAAPVQBMXP3QDDED9.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    
    
}
