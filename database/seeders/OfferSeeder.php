<?php

namespace Database\Seeders;

use App\Models\offer;
use App\Models\offer_penawaran;
use App\Models\offer_prd;
use App\Models\page3offer;
use App\Models\page4offer;
use App\Models\page6offer;
use App\Models\subpage3offer;
use App\Models\subpage5offer;
use App\Models\subpage6offer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public
    function run() {
        $offer = [
            [
                'title' => 'Offer 1',
                'subtitle' => 'We provide a wide range of organic agricultural products for food as well as for feed.'
            ]
        ];
        $offer_prd = [
            [
                'image' => '1.png',
                'title' => 'OILSEEDS',
                'subtitle' => 'We offer a variety of oilseeds, such as flax, rapeseed, sunflower seeds, and more.',
            ],
            [
                'image' => '2.png',
                'title' => 'OILSEEDS',
                'subtitle' => 'We offer a variety of oilseeds, such as flax, rapeseed, sunflower seeds, and more.',
            ],
            [
                'image' => '3.png',
                'title' => 'OILSEEDS',
                'subtitle' => 'We offer a variety of oilseeds, such as flax, rapeseed, sunflower seeds, and more.',
            ],
            [
                'image' => '4.png',
                'title' => 'OILSEEDS',
                'subtitle' => 'We offer a variety of oilseeds, such as flax, rapeseed, sunflower seeds, and more.',
            ],
            [
                'image' => '5.png',
                'title' => 'OILSEEDS',
                'subtitle' => 'We offer a variety of oilseeds, such as flax, rapeseed, sunflower seeds, and more.',
            ],
            [
                'image' => '6.png',
                'title' => 'OILSEEDS',
                'subtitle' => 'We offer a variety of oilseeds, such as flax, rapeseed, sunflower seeds, and more.',
            ]
        ];
        $offer_penawaran = [
            [
                'title' => 'Do you want to purchase our organic products or offer us your organic commodities?',
                'subtitle' => 'Please read our general terms for purchase or sale.'
            ]
        ];

        $page3 = [
            [
                'title' => 'What We Do?',
                'subtitle' => 'Our aim is to continue building up environmentally-friendly agricultural production with an eye to the health of the people who consume our products and the fertility of our soils.'
            ]
        ];
        $sub_page3 = [
            [
                'icon' => 'mdi-biohazard',
                'title' => 'Quality & Reliability',
                'subtitle' => 'We are committed to providing the highest quality of products and services to our customers.',
            ],
            [
                'icon' => 'mdi-biohazard',
                'title' => 'Quality & Reliability',
                'subtitle' => 'We are committed to providing the highest quality of products and services to our customers.',
            ],
            [
                'icon' => 'mdi-biohazard',
                'title' => 'Quality & Reliability',
                'subtitle' => 'We are committed to providing the highest quality of products and services to our customers.',
            ],
            [
                'icon' => 'mdi-biohazard',
                'title' => 'Quality & Reliability',
                'subtitle' => 'We are committed to providing the highest quality of products and services to our customers.',
            ]
        ];
        $page4 = [
            [
                'title' => 'How We Work',
                'subtitle' => 'Our know-how in the organic sector comes from more than a decade of experience, structured supply methods, and our worldwide operations. We actively seek out new projects, regions, and producers for organic farming.'
            ]
        ];
        $sub_page5 = [
            [
                'icon' => 'mdi-handshake',
                'title' => 'Farmer Cooperation',
                'subtitle' => 'We have long-term relationships, including contract farming, with producers in suitable geographical locations who share our values.',
            ],
            [
                'icon' => 'mdi-handshake',
                'title' => 'Farmer Cooperation',
                'subtitle' => 'We have long-term relationships, including contract farming, with producers in suitable geographical locations who share our values.',
            ],
            [
                'icon' => 'mdi-handshake',
                'title' => 'Farmer Cooperation',
                'subtitle' => 'We have long-term relationships, including contract farming, with producers in suitable geographical locations who share our values.',
            ],
            [
                'icon' => 'mdi-handshake',
                'title' => 'Farmer Cooperation',
                'subtitle' => 'We have long-term relationships, including contract farming, with producers in suitable geographical locations who share our values.',
            ]
        ];
        $page6 = [
            [
                'title' => 'Our Organic Progress',
                'subtitle' => 'Our group has been producing and selling 100% organic goods since 2009. AGRIWELL s.r.o. and all our contractual farms are certified in the EU'
            ]
        ];
        $subpage6 = [
            [
                'number' => '10',
                'title' => 'Our Organic Progress',
                'subtitle' => 'Our group has been producing and selling 100% organic goods since 2009. AGRIWELL s.r.o. and all our contractual farms are certified in the EU'
            ],
            [
                'number' => '20',
                'title' => 'Our Organic Progress',
                'subtitle' => 'Our group has been producing and selling 100% organic goods since 2009. AGRIWELL s.r.o. and all our contractual farms are certified in the EU'
            ],
            [
                'number' => '54000',
                'title' => 'Our Organic Progress',
                'subtitle' => 'Our group has been producing and selling 100% organic goods since 2009. AGRIWELL s.r.o. and all our contractual farms are certified in the EU'
            ],
            [
                'number' => '26000',
                'title' => 'Our Organic Progress',
                'subtitle' => 'Our group has been producing and selling 100% organic goods since 2009. AGRIWELL s.r.o. and all our contractual farms are certified in the EU'
            ]
        ];
        offer::truncate();
        offer_prd::truncate();
        offer_penawaran::truncate();
        page3offer::truncate();
        subpage3offer::truncate();
        page4offer::truncate();
        subpage5offer::truncate();
        page6offer::truncate();
        subpage6offer::truncate();

        offer::insert($offer);
        offer_prd::insert($offer_prd);
        offer_penawaran::insert($offer_penawaran);
        page3offer::insert($page3);
        subpage3offer::insert($sub_page3);
        page4offer::insert($page4);
        subpage5offer::insert($sub_page5);
        page6offer::insert($page6);
        subpage6offer::insert($subpage6);
    }
}
