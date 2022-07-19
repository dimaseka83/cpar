<?php

namespace Database\Seeders;

use App\Models\vat;
use App\Models\phone;
use App\Models\databox;
use App\Models\officeinf;
use App\Models\additional;
use App\Models\billinginf;
use App\Models\companyinf;
use App\Models\contact_title;
use App\Models\name_bank;
use App\Models\registration;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public
    function run() {
        $officeinf = [
            [
                'title' => 'Office 1',
                'title_addr' => 'Address',
                'office_name' => 'AGRIWELL s.r.o',
                'addr' => 'Plzeňská 3351/19, 150 00 Prague, Czech Republic',
                'phone_title' => 'Phone'
            ]
        ];
        $companyinf = [
            [
                'title' => 'Company Info',
                'title_reg' => 'Registration Number',
                'title_vat' => 'VAT Number',
                'title_databox' => 'Data Box ID',
                'title_additional' => 'Additional Info',
            ]
        ];
        $billinginf = [
            [
                'title' => 'Billing Info',
                'title_reg' => 'Bank',
            ]
        ];
        $registration = [
            [
                'registration' => 'CZ0990099',
            ]
        ];
        $vat = [
            [
                'title' => '(CzechRepublic)',
                'text' => 'CZ0990099',
            ],
            [
                'title' => '(Poland)',
                'text' => 'PL5263189150',
            ]
        ];
        $databox = [
            [
                'databox' => 'kp2jtnj',
            ]
        ];
        $additional = [
            [
                'additional' => 'AGRIWELL s.r.o. is registered on 17.4.2009 in the Commercial Register with the Municipal Court in Prague, section C, insert 150860.',
            ]
        ];
        $phone = [
            [
                'number' => '+420 774 774 774',
                'title' => 'Quality',
            ],
            [
                'number' => '+420 774 774 774',
                'title' => 'Purchase',
            ],
            [
                'number' => '+420 774 774 774',
                'title' => 'Sales',
            ],
            [
                'number' => '+420 774 774 774',
                'title' => 'Logistics',
            ]
        ];
        $name_bank = [
            [
                'name_bank' => 'Československá obchodní banka, a.s. Radlická 333/150, 150 57 Prague, Czech Republic',
            ]
        ];
        $contact_title = [
            [
                'title' => 'Contact Us',
                'text' => 'We respect your privacy and do not to tolerate spam. Therefore we will never sell, rent, lease, or give away your information. We will use your contact information only to contact you. The information will not be used for other purposes. For more information, review our privacy policy.',
            ]
        ];

        officeinf::truncate();
        companyinf::truncate();
        billinginf::truncate();
        registration::truncate();
        vat::truncate();
        databox::truncate();
        additional::truncate();
        phone::truncate();
        name_bank::truncate();
        contact_title::truncate();
       
        officeinf::insert($officeinf);
        companyinf::insert($companyinf);
        billinginf::insert($billinginf);
        registration::insert($registration);
        vat::insert($vat);
        databox::insert($databox);
        additional::insert($additional);
        phone::insert($phone);
        name_bank::insert($name_bank);
        contact_title::insert($contact_title);
    }
}
