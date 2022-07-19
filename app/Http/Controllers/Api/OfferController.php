<?php

namespace App\Http\Controllers\Api;

use App\Models\offer;
use App\Models\offer_prd;
use App\Models\page3offer;
use App\Models\page4offer;
use App\Models\page6offer;
use Illuminate\Http\Request;
use App\Models\subpage3offer;
use App\Models\subpage5offer;
use App\Models\subpage6offer;
use App\Models\offer_penawaran;
use App\Http\Controllers\Controller;

class OfferController extends Controller
{
    public function getOffers()
    {
        return response()->json(offer::all());
    }
    public function getOfferPrd()
    {
        return response()->json(offer_prd::all());
    }
    public function getOfferPenawaran()
    {
        return response()->json(offer_penawaran::all());
    }
    public function getPage3()
    {
        return response()->json(page3offer::all());
    }
    public function getSubpage3()
    {
        return response()->json(subpage3offer::all());
    }
    public function getPage4()
    {
        return response()->json(page4offer::all());
    }
    public function getSubpage5()
    {
        return response()->json(subpage5offer::all());
    }
    public function getPage6()
    {
        return response()->json(page6offer::all());
    }
    public function getSubpage6()
    {
        return response()->json(subpage6offer::all());
    }
}
