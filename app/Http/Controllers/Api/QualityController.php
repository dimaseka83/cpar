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

    public function postPartnerLogo(Request $request)
    {
        try {
            if(isset($request->id)){
                $partner_logo = partner_logo::find($request->id);
                if ($request->image !== $partner_logo->image && $request->image !== null) {
                    if ($request->hasFile('image')) {
                        if ($partner_logo->image != null) {
                            $image_path = public_path() . '/images/quality/partner_logo/' . $partner_logo->image;
                            if (file_exists($image_path)) {
                                unlink($image_path);
                            }
                        }
                        $image = $request->file('image');
                        $name = time() . '.' . $image->getClientOriginalExtension();
                        $destinationPath = public_path('/images/quality/partner_logo');
                        $image->move($destinationPath, $name);
                    }
                }
                $partner_logo->update([
                    'image' => $name,
                ]);
            }else{
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $name = time() . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/images/quality/partner_logo');
                    $image->move($destinationPath, $name);
                }
                $partner_logo = partner_logo::create([
                    'image' => $name,
                ]);
            }
            return response()->json($partner_logo);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function postOurSocial(Request $request)
    {
        try {
            if(isset($request->id)){
                $our_social = our_social::find($request->id);
                $our_social->update($request->all());
            }else{
                $our_social = our_social::create($request->all());
            }
            return response()->json($our_social);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function postOurCertifications(Request $request)
    {
        try {
            if(isset($request->id)){
                $ourcertifications = ourcertifications::find($request->id);
                $ourcertifications->update($request->all());
            }else{
                $ourcertifications = ourcertifications::create($request->all());
            }
            return response()->json($ourcertifications);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function postCertificationLogo(Request $request)
    {
        try {
            if(isset($request->id)){
                $certification_logo = certification_logo::find($request->id);
                if ($request->image !== $certification_logo->image && $request->image !== null) {
                    if ($request->hasFile('image')) {
                        if ($certification_logo->image != null) {
                            $image_path = public_path() . '/images/quality/certification_logo/' . $certification_logo->image;
                            if (file_exists($image_path)) {
                                unlink($image_path);
                            }
                        }
                        $image = $request->file('image');
                        $name = time() . '.' . $image->getClientOriginalExtension();
                        $destinationPath = public_path('/images/quality/certification_logo');
                        $image->move($destinationPath, $name);
                    }
                }
                $certification_logo->update([
                    'image' => $name,
                ]);
            }else{
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $name = time() . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/images/quality/certification_logo');
                    $image->move($destinationPath, $name);
                }
                $certification_logo = certification_logo::create([
                    'image' => $name,
                ]);
            }
            return response()->json($certification_logo);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function postCertification(Request $request)
    {
        try {
            if(isset($request->id)){
                $certification = certification::find($request->id);
                $certification->update($request->all());
            }else{
                $certification = certification::create($request->all());
            }
            return response()->json($certification);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function postStrictPage(Request $request)
    {
        try {
            if(isset($request->id)){
                $strictpage = strictpage::find($request->id);
                $strictpage->update($request->all());
            }else{
                $strictpage = strictpage::create($request->all());
            }
            return response()->json($strictpage);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function postStrictLogo(Request $request)
    {
        try {
            if(isset($request->id)){
                $strict_logo = strict_logo::find($request->id);
                if ($request->image !== $strict_logo->image && $request->image !== null) {
                    if ($request->hasFile('image')) {
                        if ($strict_logo->image != null) {
                            $image_path = public_path() . '/images/quality/strict_logo/' . $strict_logo->image;
                            if (file_exists($image_path)) {
                                unlink($image_path);
                            }
                        }
                        $image = $request->file('image');
                        $name = time() . '.' . $image->getClientOriginalExtension();
                        $destinationPath = public_path('/images/quality/strict_logo');
                        $image->move($destinationPath, $name);
                    }
                }
                $strict_logo->update([
                    'image' => $name,
                ]);
            }else{
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $name = time() . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/images/quality/strict_logo');
                    $image->move($destinationPath, $name);
                }
                $strict_logo = strict_logo::create([
                    'image' => $name,
                ]);
            }
            return response()->json($strict_logo);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function postHeadQc(Request $request)
    {
        try {
            if(isset($request->id)){
                $headqc = headqc::find($request->id);
                if ($request->image !== $headqc->image && $request->image !== null) {
                    if ($request->hasFile('image')) {
                        if ($headqc->image != null) {
                            $image_path = public_path() . '/images/quality/headqc/' . $headqc->image;
                            if (file_exists($image_path)) {
                                unlink($image_path);
                            }
                        }
                        $image = $request->file('image');
                        $name = time() . '.' . $image->getClientOriginalExtension();
                        $destinationPath = public_path('/images/quality/headqc');
                        $image->move($destinationPath, $name);
                    }
                }
                $headqc->update([
                    'image' => $name,
                    'title' => $request->title,
                    'name' => $request->name,
                ]);
            }else{
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $name = time() . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/images/quality/headqc');
                    $image->move($destinationPath, $name);
                }
                $headqc = headqc::create([
                    'image' => $name,
                    'title' => $request->title,
                    'name' => $request->name,
                ]);
            }
            return response()->json($headqc);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function postHeadEmail(Request $request)
    {
        try {
            if(isset($request->id)){
                $heademail = heademail::find($request->id);
                $heademail->update($request->all());
            }else{
                $heademail = heademail::create($request->all());
            }
            return response()->json($heademail);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function postHapusPartnerLogo(Request $request)
    {
        try {
            $partner_logo = partner_logo::find($request->id);
            $image_path = public_path() . '/images/quality/partner_logo/' . $partner_logo->image;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $partner_logo->delete();
            return response()->json($partner_logo);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
    public function postHapusOurSocial(Request $request)
    {
        try {
            $our_social = our_social::find($request->id);
            $our_social->delete();
            return response()->json($our_social);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function postHapusCertificationLogo(Request $request)
    {
        try {
            $certification_logo = certification_logo::find($request->id);
            $image_path = public_path() . '/images/quality/certification_logo/' . $certification_logo->image;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $certification_logo->delete();
            return response()->json($certification_logo);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function postHapusOurCertifications(Request $request)
    {
        try {
            $our_certifications = ourcertifications::find($request->id);
            $our_certifications->delete();
            return response()->json($our_certifications);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function postHapusStrictPage(Request $request)
    {
        try {
            $strict_page = strictpage::find($request->id);
            $strict_page->delete();
            return response()->json($strict_page);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
    
    public function postHapusStrictLogo(Request $request)
    {
        try {
            $strict_logo = strict_logo::find($request->id);
            $image_path = public_path() . '/images/quality/strict_logo/' . $strict_logo->image;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $strict_logo->delete();
            return response()->json($strict_logo);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function postHapusQc(Request $request)
    {
        try {
            $headqc = headqc::find($request->id);
            $image_path = public_path() . '/images/quality/headqc/' . $headqc->image;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $headqc->delete();
            return response()->json($headqc);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function postHapusEmail(Request $request)
    {
        try {
            $heademail = heademail::find($request->id);
            $heademail->delete();
            return response()->json($heademail);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

}
