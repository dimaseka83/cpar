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
}
