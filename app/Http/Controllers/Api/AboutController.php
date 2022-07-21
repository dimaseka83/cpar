<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\about_ceo;
use App\Models\mission;
use App\Models\mission_content;
use App\Models\percentage_product;
use App\Models\product;
use App\Models\team;
use App\Models\team_detail;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function getMission()
    {
        $missions = mission::all();
        $mission_contents = mission_content::all();
        $data = [];
        foreach ($missions as $mission) {
            $mission->mission_content = $mission_contents->where('mission_id', $mission->id);
            $data[] = $mission;
        }
        return response()->json($data);
    }

    public function getMissionKhusus()
    {
        return response()->json(mission::all());
    }

    public function getMissionContentKhusus()
    {
        return response()->json(mission_content::all());
    }

    public function getProducts()
    {
        return response()->json(product::all());
    }

    public function getPercentageProducts()
    {
        return response()->json(percentage_product::all());
    }

    public function getTeam()
    {
        return response()->json(team::all());
    }

    public function getTeamDetails()
    {
        return response()->json(team_detail::all());
    }

    public function getAboutCeo()
    {
        return response()->json(about_ceo::all());
    }

    public function postMission(Request $request)
    {
        try {
            if(isset($request->id)){
                $mission = mission::find($request->id);
                $mission->update($request->all());
            }else{
                $mission = mission::create($request->all());
            }
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function postMissionContent(Request $request)
    {
        try {
            if(isset($request->id)){
                $mission_content = mission_content::find($request->id);
                $mission_content->update($request->all());
            }else{
                $mission_content = new mission_content();
                $mission_content->create($request->all());
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function postProducts(Request $request)
    {
        try {
            if(isset($request->id)){
                $product = product::find($request->id);
                $product->update($request->all());
            }else{
                $product = product::create($request->all());
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function postPercentageProducts(Request $request)
    {
        try {
            if(isset($request->id)){
                $percentage_product = percentage_product::find($request->id);
                $percentage_product->update($request->all());
            }else{
                $percentage_product = percentage_product::create($request->all());
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function postTeam(Request $request)
    {
        try {
            if(isset($request->id)){
                $team = team::find($request->id);
                $team->update($request->all());
            }else{
                $team = team::create($request->all());
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function postTeamDetails(Request $request)
    {
        try {
            if(isset($request->id)){
                $team_detail = team_detail::find($request->id);
                if ($request->image !== $team_detail->image && $request->image !== null) {
                    if ($request->hasFile('image')) {
                        if ($team_detail->image != null) {
                            $image_path = public_path() . '/images/about/team_detail' . $team_detail->image;
                            if (file_exists($image_path)) {
                                unlink($image_path);
                            }
                        }
                        $image = $request->file('image');
                        $name = time() . '.' . $image->getClientOriginalExtension();
                        $destinationPath = public_path('/images/about/team_detail');
                        $image->move($destinationPath, $name);
                    }
                }
                $team_detail->update([
                    'image' => $name,
                    'name' => $request->name,
                    'position' => $request->position,
                ]);
            }else{
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $name = time() . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/images/about/about_ceo');
                    $image->move($destinationPath, $name);
                }
                $team_detail = team_detail::create([
                    'image' => $name,
                    'name' => $request->name,
                    'position' => $request->position,
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function postAboutCeo(Request $request)
    {
        try {
            if(isset($request->id)){
                $about_ceo = about_ceo::find($request->id);
                if ($request->image !== $about_ceo->image && $request->image !== null) {
                    if ($request->hasFile('image')) {
                        if ($about_ceo->image != null) {
                            $image_path = public_path() . '/images/about/about_ceo' . $about_ceo->image;
                            if (file_exists($image_path)) {
                                unlink($image_path);
                            }
                        }
                        $image = $request->file('image');
                        $name = time() . '.' . $image->getClientOriginalExtension();
                        $destinationPath = public_path('/images/about/about_ceo');
                        $image->move($destinationPath, $name);
                    }
                }
                $about_ceo->update([
                    'image' => $name,
                    'title' => $request->title,
                    'subtitle' => $request->subtitle,
                    'name_ceo' => $request->name_ceo,
                    'position_ceo' => $request->position_ceo,
                ]);
            }else{
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $name = time() . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/images/about/about_ceo');
                    $image->move($destinationPath, $name);
                }
                $about_ceo = about_ceo::create([
                    'image' => $name,
                    'title' => $request->title,
                    'subtitle' => $request->subtitle,
                    'name_ceo' => $request->name_ceo,
                    'position_ceo' => $request->position_ceo,
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function postMissionDelete(Request $request)
    {
        try {
            $mission = mission::find($request->id);
            $mission->delete();
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function postMissionContentDelete(Request $request)
    {
        try {
            $mission_content = mission_content::find($request->id);
            $mission_content->delete();
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
}
