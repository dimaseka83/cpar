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

    public function postPerusahaan(Request $request)
    {
        try {
            if(isset($request->id)){
                $perusahaan = perusahaan_detail::find($request->id);
                $perusahaan->update($request->all());
            }else{
                $perusahaan = perusahaan_detail::create($request->all());
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()]);
        }
    }

    public function postContact(Request $request)
    {
        try {
            if(isset($request->id)){
                $contact = contact::find($request->id);
                $contact->update($request->all());
            }else{
                $contact = contact::create($request->all());
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()]);
        }
    }

    public function postSocialMedia(Request $request)
    {
        try {
            if(isset($request->id)){
                $social_media = social_media::find($request->id);
                $social_media->update($request->all());
            }else{
                $social_media = social_media::create($request->all());
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()]);
        }
    }

    public function postDetailFooter(Request $request)
    {
        try {
            if(isset($request->id)){
                $footer_desc = footer_desc::find($request->id);
                $footer_desc->update($request->all());
            }else{
                $footer_desc = footer_desc::create($request->all());
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()]);
        }
    }
}
