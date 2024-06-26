<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'id' => 'A3R9K7',
                'product_name' => 'Female Hand Bag',
                'size' => '-',
                'quantity' => 0,
                'category' => 'Female',
                'image' => 'FemaleHandBag.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'L8P2F6',
                'product_name' => 'Wings',
                'size' => '-',
                'quantity' => 404,
                'category' => 'Both',
                'image' => 'Wing.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'M5Z1E9',
                'product_name' => 'Trolley Bag',
                'size' => '-',
                'quantity' => 50,
                'category' => 'Both',
                'image' => 'TrolleyBag.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'T7Y2W8',
                'product_name' => 'Female Red Blazzer',
                'size' => 'XS',
                'quantity' => 24,
                'category' => 'Female',
                'image' => 'FemaleRedBlazzer.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'G4Q6X5',
                'product_name' => 'Female Red Blazzer',
                'size' => 'S',
                'quantity' => 21,
                'category' => 'Female',
                'image' => 'FemaleRedBlazzer.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'J9B1V7',
                'product_name' => 'Female Red Blazzer',
                'size' => 'M',
                'quantity' => 36,
                'category' => 'Female',
                'image' => 'FemaleRedBlazzer.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'N6C3D8',
                'product_name' => 'Female Red Blazzer',
                'size' => 'L',
                'quantity' => 6,
                'category' => 'Female',
                'image' => 'FemaleRedBlazzer.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'R8L6K9',
                'product_name' => 'Female Red Blazzer',
                'size' => 'XL',
                'quantity' => 40,
                'category' => 'Female',
                'image' => 'FemaleRedBlazzer.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'H2S5T4',
                'product_name' => 'Compression Top',
                'size' => 'XS',
                'quantity' => 460,
                'category' => 'Female',
                'image' => 'CompressionTop.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'W8U7O2',
                'product_name' => 'Compression Top',
                'size' => 'S',
                'quantity' => 572,
                'category' => 'Female',
                'image' => 'CompressionTop.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'R1I4L3',
                'product_name' => 'Compression Top',
                'size' => 'M',
                'quantity' => 634,
                'category' => 'Female',
                'image' => 'CompressionTop.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'V5E9F2',
                'product_name' => 'Compression Top',
                'size' => 'L',
                'quantity' => 154,
                'category' => 'Female',
                'image' => 'CompressionTop.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'O3J7K6',
                'product_name' => 'Female Red Skirt',
                'size' => 'XS',
                'quantity' => 130,
                'category' => 'Female',
                'image' => 'FemaleRedSkirt.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'Y6W2X9',
                'product_name' => 'Female Red Skirt',
                'size' => 'S',
                'quantity' => 13,
                'category' => 'Female',
                'image' => 'FemaleRedSkirt.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'D8B4C1',
                'product_name' => 'Female Red Skirt',
                'size' => 'S+',
                'quantity' => 9,
                'category' => 'Female',
                'image' => 'FemaleRedSkirt.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'Q9A2R5',
                'product_name' => 'Female Red Skirt',
                'size' => 'M',
                'quantity' => 136,
                'category' => 'Female',
                'image' => 'FemaleRedSkirt.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'Z1M8N3',
                'product_name' => 'Female Red Skirt',
                'size' => 'M+',
                'quantity' => 0,
                'category' => 'Female',
                'image' => 'FemaleRedSkirt.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'E7G4H6',
                'product_name' => 'Female Red Skirt',
                'size' => 'L',
                'quantity' => 16,
                'category' => 'Female',
                'image' => 'FemaleRedSkirt.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'X2T9U1',
                'product_name' => 'Female Red Skirt',
                'size' => 'L+',
                'quantity' => 42,
                'category' => 'Female',
                'image' => 'FemaleRedSkirt.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'P5Q7V2',
                'product_name' => 'Female Red Skirt',
                'size' => 'XL',
                'quantity' => 4,
                'category' => 'Female',
                'image' => 'FemaleRedSkirt.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'I5L3O7',
                'product_name' => 'Female Ground Shoes',
                'size' => 35,
                'quantity' => 6,
                'category' => 'Female',
                'image' => 'FemaleGroundShoes.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'P6V1W4',
                'product_name' => 'Female Ground Shoes',
                'size' => 36,
                'quantity' => 8,
                'category' => 'Female',
                'image' => 'FemaleGroundShoes.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'K9F2J7',
                'product_name' => 'Female Ground Shoes',
                'size' => 37,
                'quantity' => 29,
                'category' => 'Female',
                'image' => 'FemaleGroundShoes.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'S4T6Y8',
                'product_name' => 'Female Ground Shoes',
                'size' => 38,
                'quantity' => 22,
                'category' => 'Female',
                'image' => 'FemaleGroundShoes.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'U1O2P5',
                'product_name' => 'Female Ground Shoes',
                'size' => 39,
                'quantity' => 15,
                'category' => 'Female',
                'image' => 'FemaleGroundShoes.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'B6C9D1',
                'product_name' => 'Female Ground Shoes',
                'size' => 40,
                'quantity' => 3,
                'category' => 'Female',
                'image' => 'FemaleGroundShoes.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'F3H7I4',
                'product_name' => 'Female Ground Shoes',
                'size' => 41,
                'quantity' => 5,
                'category' => 'Female',
                'image' => 'FemaleGroundShoes.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'C8Q5R2',
                'product_name' => 'Female Ground Shoes',
                'size' => 42,
                'quantity' => 5,
                'category' => 'Female',
                'image' => 'FemaleGroundShoes.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'R2V7Y3',
                'product_name' => 'Female Ground Shoes',
                'size' => 43,
                'quantity' => 3,
                'category' => 'Female',
                'image' => 'FemaleGroundShoes.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'G5W9X1',
                'product_name' => 'Female Cabin Shoes',
                'size' => 35,
                'quantity' => 5,
                'category' => 'Female',
                'image' => 'FemaleCabinShoes.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'CT3Z6A8',
                'product_name' => 'Female Cabin Shoes',
                'size' => 36,
                'quantity' => 0,
                'category' => 'Female',
                'image' => 'FemaleCabinShoes.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'U9B1D4',
                'product_name' => 'Female Cabin Shoes',
                'size' => 37,
                'quantity' => 18,
                'category' => 'Female',
                'image' => 'FemaleCabinShoes.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'N4C6E2',
                'product_name' => 'Female Cabin Shoes',
                'size' => 38,
                'quantity' => 9,
                'category' => 'Female',
                'image' => 'FemaleCabinShoes.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'S7T1V8',
                'product_name' => 'Female Cabin Shoes',
                'size' => 39,
                'quantity' => 5,
                'category' => 'Female',
                'image' => 'FemaleCabinShoes.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'H3W6Y2',
                'product_name' => 'Female Cabin Shoes',
                'size' => 40,
                'quantity' => 18,
                'category' => 'Female',
                'image' => 'FemaleCabinShoes.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'M9J4K7',
                'product_name' => 'Female Cabin Shoes',
                'size' => 41,
                'quantity' => 14,
                'category' => 'Female',
                'image' => 'FemaleCabinShoes.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'P5O8Q3',
                'product_name' => 'Female Cabin Shoes',
                'size' => 42,
                'quantity' => 5,
                'category' => 'Female',
                'image' => 'FemaleCabinShoes.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'A2R6S9',
                'product_name' => 'Female Cabin Shoes',
                'size' => 43,
                'quantity' => 3,
                'category' => 'Female',
                'image' => 'FemaleCabinShoes.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'V8F1G5',
                'product_name' => 'Male Black Blazer',
                'size' => 'S',
                'quantity' => 56,
                'category' => 'Male',
                'image' => 'MaleBlackBlazer.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'L3I7N2',
                'product_name' => 'Male Black Blazer',
                'size' => 'M',
                'quantity' => 30,
                'category' => 'Male',
                'image' => 'MaleBlackBlazer.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'X9K2M4',
                'product_name' => 'Male Black Blazer',
                'size' => 'L',
                'quantity' => 24,
                'category' => 'Male',
                'image' => 'MaleBlackBlazer.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'Q6L9P1',
                'product_name' => 'Male Black Blazer',
                'size' => 'XL',
                'quantity' => 34,
                'category' => 'Male',
                'image' => 'MaleBlackBlazer.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'Z3E5F7',
                'product_name' => 'Male Black Blazer',
                'size' => 'XXL',
                'quantity' => 14,
                'category' => 'Male',
                'image' => 'MaleBlackBlazer.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'W7G1H4',
                'product_name' => 'Male Black Pants',
                'size' => 29,
                'quantity' => 7,
                'category' => 'Male',
                'image' => 'MaleBlackPants.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'I4U9V2',
                'product_name' => 'Male Black Pants',
                'size' => 30,
                'quantity' => 14,
                'category' => 'Male',
                'image' => 'MaleBlackPants.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'D1X5Y7',
                'product_name' => 'Male Black Pants',
                'size' => 31,
                'quantity' => 8,
                'category' => 'Male',
                'image' => 'MaleBlackPants.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'B8A3C6',
                'product_name' => 'Male Black Pants',
                'size' => 32,
                'quantity' => 13,
                'category' => 'Male',
                'image' => 'MaleBlackPants.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'F2T7W1',
                'product_name' => 'Male Black Pants',
                'size' => 33,
                'quantity' => 9,
                'category' => 'Male',
                'image' => 'MaleBlackPants.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'O6P9Q2',
                'product_name' => 'Male Black Pants',
                'size' => 34,
                'quantity' => 4,
                'category' => 'Male',
                'image' => 'MaleBlackPants.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'C5N8Z4',
                'product_name' => 'Male Black Pants',
                'size' => 35,
                'quantity' => 5,
                'category' => 'Male',
                'image' => 'MaleBlackPants.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'E9M3S6',
                'product_name' => 'Male Black Pants',
                'size' => 36,
                'quantity' => 2,
                'category' => 'Male',
                'image' => 'MaleBlackPants.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'Y1H7J9',
                'product_name' => 'Male Black Pants',
                'size' => 37,
                'quantity' => 1,
                'category' => 'Male',
                'image' => 'MaleBlackPants.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'R3K7A9',
                'product_name' => 'Male Shoes',
                'size' => 39,
                'quantity' => 2,
                'category' => 'Male',
                'image' => 'MaleShoes.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'F6L8P2',
                'product_name' => 'Male Shoes',
                'size' => 40,
                'quantity' => 2,
                'category' => 'Male',
                'image' => 'MaleShoes.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'M1E9Z5',
                'product_name' => 'Male Shoes',
                'size' => 41,
                'quantity' => 15,
                'category' => 'Male',
                'image' => 'MaleShoes.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'T2Y8W7',
                'product_name' => 'Male Shoes',
                'size' => 42,
                'quantity' => 8,
                'category' => 'Male',
                'image' => 'MaleShoes.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'Q6X5G4',
                'product_name' => 'Male Shoes',
                'size' => 43,
                'quantity' => 7,
                'category' => 'Male',
                'image' => 'MaleShoes.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'B1V7J9',
                'product_name' => 'Male Shoes',
                'size' => 44,
                'quantity' => 0,
                'category' => 'Male',
                'image' => 'MaleShoes.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'N3D8C6',
                'product_name' => 'Male Shoes',
                'size' => 45,
                'quantity' => 0,
                'category' => 'Male',
                'image' => 'MaleShoes.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'J4M1W3',
                'product_name' => 'Male Shoes',
                'size' => 46,
                'quantity' => 1,
                'category' => 'Male',
                'image' => 'MaleShoes.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'B2H9S5',
                'product_name' => 'Male Shoes',
                'size' => 47,
                'quantity' => 0,
                'category' => 'Male',
                'image' => 'MaleShoes.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Masukkan data produk ke dalam database
        foreach ($products as $product) {
            DB::table('products')->insert($product);
        }
    }
}
