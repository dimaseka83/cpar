<?php

namespace Database\Seeders;

use App\Models\contact;
use App\Models\footer_desc;
use Illuminate\Database\Seeder;
use App\Models\perusahaan_detail;
use App\Models\social_media;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanySeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public
    function run() {
        $perusahaan = [
            [
                'phone' => '+62812-1234-1234',
                'open_day' => 'Senin - Jumat',
                'open_hour' => '08.00 - 17.00',
            ]
        ];

        $contact = [
            [
                'icon' => 'mdi-phone',
                'text' => '+62812-1234-1234',
            ],
            [
                'icon' => 'mdi-email',
                'text' => 'mail@mail.com'
            ],
            [
                'icon' => 'mdi-map-marker',
                'text' => 'Jl. Kebon Kacang No.1, Jakarta'
            ],
            [
                'icon' => 'mdi-clock-outline',
                'text' => 'Mon-Fri: 9:00 - 17:00'
            ],
        ];

        $social_media = [
            [
                'icon' => 'mdi-facebook',
                'link' => 'https://www.facebook.com/',
            ],
            [
                'icon' => 'mdi-instagram',
                'link' => 'https://www.instagram.com/',
            ],
            [
                'icon' => 'mdi-linkedin',
                'link' => 'https://www.facebook.com/',
            ],
            [
                'icon' => 'mdi-youtube',
                'link' => 'https://www.youtube.com/',
            ]
        ];

        $description_footer = [
            [
                'text' => 'Global exporter of top quality oilseeds, pulses, and grains for human consumption, oil extraction or animal feed. We specialises in organic agriculture. The core assortment consists of organic flax seeds in range of 98-99,95% of purity, as well as poppy, mustard, caraway and other oilseeds.'
            ]
        ];

        perusahaan_detail::truncate();
        contact::truncate();
        social_media::truncate();
        footer_desc::truncate();

        perusahaan_detail::insert($perusahaan);
        contact::insert($contact);
        social_media::insert($social_media);
        footer_desc::insert($description_footer);
    }
}
