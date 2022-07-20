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

    public function postOffer(Request $request)
    {
        try {
            if(isset($request->id)){
                $offer = offer::find($request->id);
                $offer->update($request->all());
            }else{
                $offer = offer::create($request->all());
            }
            return response()->json($offer);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function postOfferPrd(Request $request)
    {
        try {
            if(isset($request->id)){
                $offer = offer_prd::find($request->id);
                $offer->update($request->all());
            }else{
                $offer = offer_prd::create($request->all());
            }
            return response()->json($offer);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function postOfferPenawaran(Request $request)
    {
        try {
            if(isset($request->id)){
                $offer = offer_penawaran::find($request->id);
                $offer->update($request->all());
            }else{
                $offer = offer_penawaran::create($request->all());
            }
            return response()->json($offer);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function postPage3(Request $request)
    {
        try {
            if(isset($request->id)){
                $offer = page3offer::find($request->id);
                $offer->update($request->all());
            }else{
                $offer = page3offer::create($request->all());
            }
            return response()->json($offer);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function postSubpage3(Request $request)
    {
        try {
            if(isset($request->id)){
                $offer = subpage3offer::find($request->id);
                $offer->update($request->all());
            }else{
                $offer = subpage3offer::create($request->all());
            }
            return response()->json($offer);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function postPage4(Request $request)
    {
        try {
            if(isset($request->id)){
                $offer = page4offer::find($request->id);
                $offer->update($request->all());
            }else{
                $offer = page4offer::create($request->all());
            }
            return response()->json($offer);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function postSubpage5(Request $request)
    {
        try {
            if(isset($request->id)){
                $offer = subpage5offer::find($request->id);
                $offer->update($request->all());
            }else{
                $offer = subpage5offer::create($request->all());
            }
            return response()->json($offer);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function postPage6(Request $request)
    {
        try {
            if(isset($request->id)){
                $offer = page6offer::find($request->id);
                $offer->update($request->all());
            }else{
                $offer = page6offer::create($request->all());
            }
            return response()->json($offer);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function postSubpage6(Request $request)
    {
        try {
            if(isset($request->id)){
                $offer = subpage6offer::find($request->id);
                $offer->update($request->all());
            }else{
                $offer = subpage6offer::create($request->all());
            }
            return response()->json($offer);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
