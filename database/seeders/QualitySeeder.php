<?php

namespace Database\Seeders;

use App\Models\certification;
use App\Models\certification_logo;
use App\Models\heademail;
use App\Models\headqc;
use App\Models\our_social;
use App\Models\ourcertifications;
use App\Models\partner_logo;
use App\Models\strict_logo;
use App\Models\strictpage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QualitySeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public
    function run() {
        $partner_logo = [
            [
                'image' => '1.png'
            ],
            [
                'image' => '2.png'
            ],
        ];
        $our_social = [
            [
                'title' => 'OUR SOCIAL & ETHICAL RESPONSIBILITY',
                'subtitle' => 'Our company complies with the four pillars of SMETA 6.0. Our audits encompass all the aspects of responsible business practices created by the Sedex Stakeholder Forum. SMETA (Sedex Members Ethical Trade Report) is an audit procedure that is a compilation of good practice in ethical audit techniques. It provides a globally-recognised way to assess responsible supply chain activities and is based on four pillars. Sedex (the Supplier Ethical Data Exchange) is a not-for-profit membership organisation that leads work with buyers and suppliers to deliver improvements in responsible and ethical business practices in global supply chains.'
            ]
        ];
        $ourcertifications = [
            [
                'title' => 'OUR ORGANIC CERTIFICATIONS',
                'subtitle' => 'We are certified by the following bodies:'
            ]
        ];
        $certification_logo = [
            [
                'image' => '1.png'
            ],
            [
                'image' => '2.png'
            ],
            [
                'image' => '3.png'
            ],
        ];
        $certification = [
            [
                'image' => '1.png',
                'title' => 'EU BIO-CERTIFICATION',
                'subtitle' => 'The European Union has a strict set of requirements for the production of organic foodstuffs. This certification is a means of ensuring that the foodstuffs produced comply with these requirements.'
            ],
            [
                'image' => '2.png',
                'title' => 'EU BIO-CERTIFICATION',
                'subtitle' => 'The European Union has a strict set of requirements for the production of organic foodstuffs. This certification is a means of ensuring that the foodstuffs produced comply with these requirements.'
            ],
            [
                'image' => '3.png',
                'title' => 'EU BIO-CERTIFICATION',
                'subtitle' => 'The European Union has a strict set of requirements for the production of organic foodstuffs. This certification is a means of ensuring that the foodstuffs produced comply with these requirements.'
            ],
            [
                'image' => '4.png',
                'title' => 'EU BIO-CERTIFICATION',
                'subtitle' => 'The European Union has a strict set of requirements for the production of organic foodstuffs. This certification is a means of ensuring that the foodstuffs produced comply with these requirements.'
            ],
        ];
        $strictpage = [
            [
                'title' => 'STRICT SUPERVISION',
                'subtitle' => 'We are committed to protecting your privacy. We will not share your personal information with any third parties.'
            ]
        ];
        $strict_logo = [
            [
                'image' => '1.png'
            ],
            [
                'image' => '2.png'
            ],
            [
                'image' => '3.png'
            ],
            [
                'image' => '4.png'
            ],
        ];
        $headqc = [
            [
                'image' => '1.jpg',
                'title' => 'Head of Quality Control',
                'name' => 'Anton R',
            ]
        ];
        $heademail = [
            [
                'title' => 'CALL OR EMAIL TO LEARN MORE',
                'subtitle' => 'Use the form below or call +420 226 208 232 to learn more about our certificates and quality assurance.'
            ]
        ];

        partner_logo::truncate();
        our_social::truncate();
        ourcertifications::truncate();
        certification_logo::truncate();
        certification::truncate();
        strictpage::truncate();
        strict_logo::truncate();
        headqc::truncate();
        heademail::truncate();

        partner_logo::insert($partner_logo);
        our_social::insert($our_social);
        ourcertifications::insert($ourcertifications);
        certification_logo::insert($certification_logo);
        certification::insert($certification);
        strictpage::insert($strictpage);
        strict_logo::insert($strict_logo);
        headqc::insert($headqc);
        heademail::insert($heademail);
    }
}
