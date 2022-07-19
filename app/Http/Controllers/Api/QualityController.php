<?php

namespace App\Http\Controllers\Api;

use App\Models\headqc;
use App\Models\heademail;
use App\Models\strictpage;
use App\Models\strict_logo;
use Illuminate\Http\Request;
use App\Models\certification;
use App\Models\ourcertifications;
use App\Models\certification_logo;
use App\Http\Controllers\Controller;
use App\Models\our_social;
use App\Models\partner_logo;

class QualityController extends Controller
{
    public function getPartnerLogo()
    {
        return response()->json(partner_logo::all());
    }

    public function getOurSocial()
    {
        return response()->json(our_social::all());
    }

    public function getOurCertifications()
    {
        return response()->json(ourcertifications::all());
    }

    public function getCertificationLogo()
    {
        return response()->json(certification_logo::all());
    }

    public function getCertification()
    {
        return response()->json(certification::all());
    }

    public function getStrictPage()
    {
        return response()->json(strictpage::all());
    }

    public function getStrictLogo()
    {
        return response()->json(strict_logo::all());
    }

    public function getHeadQc()
    {
        return response()->json(headqc::all());
    }

    public function getHeadEmail()
    {
        return response()->json(heademail::all());
    }
}
