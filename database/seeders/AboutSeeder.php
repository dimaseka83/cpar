<?php

namespace Database\Seeders;

use App\Models\about_ceo;
use App\Models\mission;
use App\Models\mission_content;
use App\Models\percentage_product;
use App\Models\product;
use App\Models\team;
use App\Models\team_detail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mission_content = [
            ['text' => 'We are systematically building a vertically integrated business model that allows our customers to plan their future crops and control quality, thereby guaranteeing stable volumes of certified organic products.', 'mission_id' => 1],
            ['text' => 'We are systematically building a vertically integrated business model that allows our customers to plan their future crops and control quality, thereby guaranteeing stable volumes of certified organic products.', 'mission_id' => 1],
        ];
        $mission = [
            [
                'title' => 'Our Mission',
                'subtitle' => 'We help farmers switch from conventional farming to organic farming.',
            ]
        ];
        $aboutceo = [
            [
                'image' => '1.png',
                'title' => 'Organic Farming is not just a trend – it’s the future!',
                'subtitle' => 'Direct contacts with farmers and farms helped build a bridge between the West and the East. Only being in fields can let you understand the problems of farmers, agricultural producers and the requirements of the market in which they want to bring their products.',
                'name_ceo' => 'Valery Kuznetsov',
                'position_ceo' => 'CEO',
            ]
            ];
        $product = [
            [
                'title' => 'Our Products',
                'subtitle' => 'During the harvest period of 2019–2020, we produced, shipped, delivered, and sold first-class certified organic raw materials:',
            ]
        ];
        $percentage_products = [
            [
                'products' => 'Oilseeds',
                'percentage' => '80',
            ],
            [
                'products' => 'Grains',
                'percentage' => '4.5',
            ],
            [
                'products' => 'Pulses',
                'percentage' => '1.5',
            ],
            [
                'products' => 'Other Products',
                'percentage' => '3',
            ],
        ];
        $team = [
            [
                'title' => 'The Best Team',
                'subtitle' => 'The most important asset our company has is our team of professionals, all of whom share the same goals and views: for healthy organic nutrition and improving the environmental situation worldwide.'
            ]
        ];
        $team_detail = [
            [
                'image' => '1.png',
                'name' => 'Valery Kuznetsov',
                'position' => 'CEO',
            ],
            [
                'image' => '2.png',
                'name' => 'Valery Kuznetsov',
                'position' => 'CEO',
            ],
            [
                'image' => '3.png',
                'name' => 'Valery Kuznetsov',
                'position' => 'CEO',
            ],
            [
                'image' => '4.png',
                'name' => 'Valery Kuznetsov',
                'position' => 'CEO',
            ],
            [
                'image' => '5.png',
                'name' => 'Valery Kuznetsov',
                'position' => 'CEO',
            ],
            [
                'image' => '6.png',
                'name' => 'Valery Kuznetsov',
                'position' => 'CEO',
            ],
            [
                'image' => '7.png',
                'name' => 'Valery Kuznetsov',
                'position' => 'CEO',
            ],
            [
                'image' => '8.png',
                'name' => 'Valery Kuznetsov',
                'position' => 'CEO',
            ]
        ];
        // mission::truncate();
        // mission_content::truncate();
        about_ceo::truncate();
        product::truncate();
        percentage_product::truncate();
        team::truncate();
        team_detail::truncate();

        mission::insert($mission);
        mission_content::insert($mission_content);
        about_ceo::insert($aboutceo);
        product::insert($product);
        percentage_product::insert($percentage_products);
        team::insert($team);
        team_detail::insert($team_detail);
    }
}
