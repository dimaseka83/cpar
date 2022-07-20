<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\contact;
use App\Models\footer_desc;
use App\Models\perusahaan_detail;
use App\Models\social_media;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    public function getPerusahaan()
    {
        return response()->json(perusahaan_detail::all());
    }

    public function getContact()
    {
        return response()->json(contact::all());
    }

    public function getSocialMedia()
    {
        return response()->json(social_media::all());
    }

    public function getDetailFooter()
    {
        return response()->json(footer_desc::all());
    }
}
