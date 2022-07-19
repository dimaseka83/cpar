<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function getOfficeInf()
    {
        return response()->json(officeinf::all());
    }

    public function getCompanyInf()
    {
        return response()->json(companyinf::all());
    }

    public function getBillingInf()
    {
        return response()->json(billinginf::all());
    }

    public function getRegistration()
    {
        return response()->json(registration::all());
    }

    public function getVat()
    {
        return response()->json(vat::all());
    }

    public function getDatabox()
    {
        return response()->json(databox::all());
    }

    public function getAdditional()
    {
        return response()->json(additional::all());
    }

    public function getPhone()
    {
        return response()->json(phone::all());
    }

    public function getNameBank()
    {
        return response()->json(name_bank::all());
    }

    public function getContactTitle()
    {
        return response()->json(contact_title::all());
    }
}
