<?php

namespace Database\Seeders;

use App\Models\ourproductscategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OurproductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            [
                'name_cat' => 'all',
            ],
            [
                'name_cat' => 'agriculture',
            ],
            [
                'name_cat' => 'fishery',
            ],
            [
                'name_cat' => 'livestock',
            ],
            [
                'name_cat' => 'poultry',
            ],
            [
                'name_cat' => 'veterinary',
            ],
        ];

        $products = [
            [
                'name_prod' => 'Yellow Flax1',
                'img_prod' => '1.png',
                'desc_prod' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'category_id' => 1,
            ],
            [
                'name_prod' => 'Yellow Flax2',
                'img_prod' => '2.png',
                'desc_prod' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'category_id' => 2,
            ],
            [
                'name_prod' => 'Yellow Flax3',
                'img_prod' => '3.png',
                'desc_prod' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'category_id' => 3,
            ],
            [
                'name_prod' => 'Yellow Flax4',
                'img_prod' => '4.png',
                'desc_prod' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'category_id' => 4,
            ],
            [
                'name_prod' => 'Yellow Flax5',
                'img_prod' => '5.png',
                'desc_prod' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'category_id' => 5,
            ],
            [
                'name_prod' => 'Yellow Flax6',
                'img_prod' => '6.png',
                'desc_prod' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'category_id' => 1,
            ],
            [
                'name_prod' => 'Yellow Flax7',
                'img_prod' => '8.png',
                'desc_prod' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'category_id' => 2,
            ],
            [
                'name_prod' => 'Yellow Flax8',
                'img_prod' => '8.png',
                'desc_prod' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'category_id' => 3,
            ],
            [
                'name_prod' => 'Yellow Flax9',
                'img_prod' => '9.png',
                'desc_prod' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'category_id' => 4,
            ],
            [
                'name_prod' => 'Yellow Flax10',
                'img_prod' => '10.png',
                'desc_prod' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'category_id' => 5,
            ],
        ];

        ourproductscategory::insert($category);
        ourproducts::insert($products);
    }
}
