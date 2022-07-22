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
                if ($request->image !== $offer->image && $request->image !== null) {
                    if ($request->hasFile('image')) {
                        if ($offer->image != null) {
                            $image_path = public_path() . '/images/offer/offer_prd/' . $offer->image;
                            if (file_exists($image_path)) {
                                unlink($image_path);
                            }
                        }
                        $image = $request->file('image');
                        $name = time() . '.' . $image->getClientOriginalExtension();
                        $destinationPath = public_path('/images/offer/offer_prd');
                        $image->move($destinationPath, $name);
                    }
                }
                $offer->update([
                    'image' => $name,
                    'title' => $request->title,
                    'subtitle' => $request->subtitle,
                ]);
            }else{
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $name = time() . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/images/offer/offer_prd');
                    $image->move($destinationPath, $name);
                }
                $offer = offer_prd::create([
                    'image' => $name,
                    'title' => $request->title,
                    'subtitle' => $request->subtitle,
                ]);
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

    public function deleteOffer(Request $request)
    {
        try {
            $offer = offer::find($request->id);
            $offer->delete();
            return response()->json($offer);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function deleteOfferPrd(Request $request)
    {
        try {
            $offer = offer_prd::find($request->id);
            if ($offer->image != null) {
                $image_path = public_path() . '/images/offer/offer_prd/' . $offer->image;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            $offer->delete();
            return response()->json($offer);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
    
    public function deleteOfferPenawaran(Request $request)
    {
        try {
            $offer = offer_penawaran::find($request->id);
            $offer->delete();
            return response()->json($offer);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function deletePage3(Request $request)
    {
        try {
            $offer = page3offer::find($request->id);
            $offer->delete();
            return response()->json($offer);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function deleteSubPage3(Request $request)
    {
        try {
            $offer = subpage3offer::find($request->id);
            $offer->delete();
            return response()->json($offer);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function deletePage4(Request $request)
    {
        try {
            $offer = page4offer::find($request->id);
            $offer->delete();
            return response()->json($offer);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function deleteSubPage5(Request $request)
    {
        try {
            $offer = subpage5offer::find($request->id);
            $offer->delete();
            return response()->json($offer);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function page6Delete(Request $request)
    {
        try {
            $offer = page6offer::find($request->id);
            $offer->delete();
            return response()->json($offer);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function deleteSubPage6(Request $request)
    {
        try {
            $offer = subpage6offer::find($request->id);
            $offer->delete();
            return response()->json($offer);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
