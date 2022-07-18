<?php

namespace Database\Seeders;

use App\Models\imagesSlides;
use App\Models\news;
use App\Models\page2;
use App\Models\page3;
use App\Models\page4;
use App\Models\page5;
use App\Models\page6;
use App\Models\page7;
use App\Models\progress;
use App\Models\services;
use App\Models\slides;
use App\Models\subpage3;
use App\Models\subpage5;
use App\Models\subpage6;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slide = [
            [
                'image' => '1.avif',
                'title' => 'new corp 2021',
                'subtitle' => 'stay tuned for our organic crop 2021 growth online'
            ],
            [
                'image' => '2.avif',
                'title' => 'new corp 2021',
                'subtitle' => 'stay tuned for our organic crop 2021 growth online'
            ],            
            [
                'image' => '3.avif',
                'title' => 'new corp 2021',
                'subtitle' => 'stay tuned for our organic crop 2021 growth online'
            ],
        ];
        $images_slides = [
            [
                'image' => '1.avif',
            ],
            [
                'image' => '2.avif',
            ],
            [
                'image' => '3.avif',
            ],
        ];
        $page2 = [
            [
                'title' => 'European expert in organic agriculture',
                'subtitle' => 'We are a global exporter of top-quality oilseeds, pulses, and grains for human consumption, oil extraction, or animal feed. We specialise in organic agriculture. The core of our offer consists of organic flax seeds in the range of 98–99.99% purity, as well as poppy, mustard, caraway, and other oilseeds. Since 2015 our offer has included dried fruit such as apricots, mulberries, rose hips, and raisins. Most of our goods originate from the Czech Republic, Eastern Europe, and Central Asia.'
            ],
        ];
        $page3 = [
            [
                'image' => 'home-farmers',
                'title' => 'European expert in organic agriculture',
                'subtitle' => 'We are a global exporter of top-quality oilseeds, pulses, and grains for human consumption, oil extraction, or animal feed. We specialise in organic agriculture. The core of our offer consists of organic flax seeds in the range of 98–99.99% purity, as well as poppy, mustard, caraway, and other oilseeds. Since 2015 our offer has included dried fruit such as apricots, mulberries, rose hips, and raisins. Most of our goods originate from the Czech Republic, Eastern Europe, and Central Asia.'
            ],
        ];
        $sub_page3 = [
            [
                'icon' => 'mdi-hat-fedora',
                'title' => 'Organic Consulting',
                'subtitle' => 'We help farmers switch from conventional farming to organic farming.'
            ],
            [
                'icon' => 'mdi-hat-fedora',
                'title' => 'Organic Consulting',
                'subtitle' => 'We help farmers switch from conventional farming to organic farming.'
            ],
            [
                'icon' => 'mdi-hat-fedora',
                'title' => 'Organic Consulting',
                'subtitle' => 'We help farmers switch from conventional farming to organic farming.'
            ],
            [
                'icon' => 'mdi-hat-fedora',
                'title' => 'Organic Consulting',
                'subtitle' => 'We help farmers switch from conventional farming to organic farming.'
            ],
        ];
        $page4 = [
            [
                'title' => 'Our Main Services',
                'subtitle1' => 'We produce, ship, supply, and trade first-class certified organic raw materials and processed goods for the international food and animal feed industries.',
                'subtitle2' => 'Our know-how in the organic sector comes from more than decade of experience, structured supply methods, and our worldwide operations.'
            ]
        ];
        $services = [
            [
                'icon' => 'mdi-biohazard',
                'title' => 'BIO Certification',
                'subtitle' => 'We provide informational support and we prepare and collect required documents and certificates for organic farming.'
            ],
            [
                'icon' => 'mdi-barn',
                'title' => 'Organic Farming',
                'subtitle' => 'We provide informational support and we prepare and collect required documents and certificates for organic farming.'
            ],
            [
                'icon' => 'mdi-warehouse',
                'title' => 'Warehousing & Storage',
                'subtitle' => 'We provide informational support and we prepare and collect required documents and certificates for organic farming.'
            ],
            [
                'icon' => 'mdi-biohazard',
                'title' => 'BIO Certification',
                'subtitle' => 'We provide informational support and we prepare and collect required documents and certificates for organic farming.'
            ],
            [
                'icon' => 'mdi-barn',
                'title' => 'Organic Farming',
                'subtitle' => 'We provide informational support and we prepare and collect required documents and certificates for organic farming.'
            ],
            [
                'icon' => 'mdi-warehouse',
                'title' => 'Warehousing & Storage',
                'subtitle' => 'We provide informational support and we prepare and collect required documents and certificates for organic farming.'
            ],
        ];
        $progress = [
            [
                'number' => '10',
                'title' => 'Over 10 Years on the Market',
                'subtitle' => 'We have been exporting and importing agricultural goods in the EU for over a decade.'
            ],
            [
                'number' => '26',
                'title' => 'Over 10 Years on the Market',
                'subtitle' => 'We have been exporting and importing agricultural goods in the EU for over a decade.'
            ],
            [
                'number' => '54',
                'title' => 'Over 10 Years on the Market',
                'subtitle' => 'We have been exporting and importing agricultural goods in the EU for over a decade.'
            ],
            [
                'number' => '20',
                'title' => 'Over 10 Years on the Market',
                'subtitle' => 'We have been exporting and importing agricultural goods in the EU for over a decade.'
            ],
        ];
        $page5 = [
            [
                'title' => 'Work With Us',
                'subtitle' => 'We actively seek out new projects, regions, and producers for organic farming.'
            ]
        ];
        $sub_page5 = [
            [
                'icon' => 'mdi-hat-fedora',
                'title' => '01. Contact us at a convenient time for you.',
                'subtitle' => 'Get in touch with us via email or phone, or visit our office to have a cup of organic tea. Our team speaks English, Czech, Slovak, Polish, Ukrainian, and Russian.'
            ],
            [
                'icon' => 'mdi-hat-fedora',
                'title' => '02. Present your needs, ideas or thoughts.',
                'subtitle' => 'Our experts are looking forward to hearing and discussing your projects.'
            ],
            [
                'icon' => 'mdi-hat-fedora',
                'title' => '01. Contact us at a convenient time for you.',
                'subtitle' => 'Get in touch with us via email or phone, or visit our office to have a cup of organic tea. Our team speaks English, Czech, Slovak, Polish, Ukrainian, and Russian.'
            ]
        ];
        $page6 = [
            [
                'title' => 'What People Say'
            ]
        ];
        $sub_page6 = [
            [
                'image' => '1.avif',
                'title' => '01. Contact us at a convenient time for you.',
                'people_name' => 'John Doe',
                'people_position' => 'CEO',
            ],
            [
                'image' => '2.avif',
                'title' => '02. Present your needs, ideas or thoughts.',
                'people_name' => 'John Doe',
                'people_position' => 'CEO',
            ],
            [
                'image' => '3.avif',
                'title' => '01. Contact us at a convenient time for you.',
                'people_name' => 'John Doe',
                'people_position' => 'CEO',
            ]
        ];
        $page7 = [
            [
                'title' => 'Latest News',
                'subtitle' => 'The latest news from our company, as well as all the most interesting world news and trends in organic farming and biodynamics.'
            ]
        ];
        $news = [
            [
                'number' => '1',
                'image' => '1.png',
                'date' => '2020-09-01',
                'category_news' => 'News',
                'title' => 'The latest news from our company',
                'subtitle' => 'The latest news from our company, as well as all the most interesting world news and trends in organic farming and biodynamics.',
            ],
            [
                'number' => '2',
                'image' => '2.png',
                'date' => '2020-09-01',
                'category_news' => 'News',
                'title' => 'The latest news from our company',
                'subtitle' => 'The latest news from our company, as well as all the most interesting world news and trends in organic farming and biodynamics.',
            ],
            [
                'number' => '3',
                'image' => '3.png',
                'date' => '2020-09-01',
                'category_news' => 'News',
                'title' => 'The latest news from our company',
                'subtitle' => 'The latest news from our company, as well as all the most interesting world news and trends in organic farming and biodynamics.',
            ]
        ];
        slides::truncate();
        imagesSlides::truncate();
        page2::truncate();
        page3::truncate();
        subpage3::truncate();
        page4::truncate();
        services::truncate();
        progress::truncate();
        page5::truncate();
        subpage5::truncate();
        page6::truncate();
        subpage6::truncate();
        page7::truncate();
        news::truncate();

        slides::insert($slide);
        imagesSlides::insert($images_slides);
        page2::insert($page2);
        page3::insert($page3);
        subpage3::insert($sub_page3);
        page4::insert($page4);
        services::insert($services);
        progress::insert($progress);
        page5::insert($page5);
        subpage5::insert($sub_page5);
        page6::insert($page6);
        subpage6::insert($sub_page6);
        page7::insert($page7);
        news::insert($news);
    }
}
