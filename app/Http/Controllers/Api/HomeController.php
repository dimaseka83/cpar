<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\imagesSlides;
use App\Models\news;
use App\Models\page2;
use App\Models\page3;
use App\Models\page4;
use App\Models\page5;
use App\Models\page6;
use App\Models\page7;
use App\Models\progress;
use App\Models\services;
use App\Models\slides;
use App\Models\subpage3;
use App\Models\subpage5;
use App\Models\subpage6;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getSlides()
    {
        return response()->json(slides::all());
    }

    public function getImagesSlides()
    {
        return response()->json(imagesSlides::all());
    }

    public function getPage2()
    {
        return response()->json(page2::all());
    }

    public function getPage3()
    {
        return response()->json(page3::all());
    }

    public function getSubpage3()
    {
        return response()->json(subpage3::all());
    }

    public function getPage4()
    {
        return response()->json(page4::all());
    }

    public function getServices()
    {
        return response()->json(services::all());
    }

    public function getProgress()
    {
        return response()->json(progress::all());
    }

    public function getPage5()
    {
        return response()->json(page5::all());
    }

    public function getSubpage5()
    {
        return response()->json(subpage5::all());
    }

    public function getPage6()
    {
        return response()->json(page6::all());
    }

    public function getSubpage6()
    {
        return response()->json(subpage6::all());
    }

    public function getPage7()
    {
        return response()->json(page7::all());
    }

    public function getNews()
    {
        return response()->json(news::all());
    }
}
