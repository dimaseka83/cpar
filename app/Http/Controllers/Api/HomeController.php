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

    // Post

    public function postSlides(Request $request)
    {
        try {
            if (isset($request->id)) {
                $slide = slides::find($request->id);
                if ($request->image !== $slide->image && $request->image !== null) {
                    if ($request->hasFile('image')) {
                        if ($slide->image != null) {
                            $image_path = public_path() . '/images/home/slides' . $slide->image;
                            if (file_exists($image_path)) {
                                unlink($image_path);
                            }
                        }
                        $image = $request->file('image');
                        $name = time() . '.' . $image->getClientOriginalExtension();
                        $destinationPath = public_path('/images/home/slides');
                        $image->move($destinationPath, $name);
                    }
                }

                if ($request->image !== $slide->image) {
                    $nameImage = $name;
                } else {
                    $nameImage = $request->image;
                }
                $slide->update([
                    'title' => $request->title,
                    'subtitle' => $request->subtitle,
                    'image' => $nameImage,
                ]);
            } else {
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $name = time() . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/images/home/slides');
                    $image->move($destinationPath, $name);
                }
                $data = slides::create([
                    'title' => $request->title,
                    'subtitle' => $request->subtitle,
                    'image' => $name,
                ]);
                return response()->json($data);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function postImagesSlides(Request $request)
    {
        try {
            if (isset($request->id)) {
                $slide = imagesSlides::find($request->id);
                if ($request->image !== $slide->image && $request->image !== null) {
                    if ($request->hasFile('image')) {
                        if ($slide->image != null) {
                            $image_path = public_path() . '/images/home/imagesSlides' . $slide->image;
                            if (file_exists($image_path)) {
                                unlink($image_path);
                            }
                        }
                        $image = $request->file('image');
                        $name = time() . '.' . $image->getClientOriginalExtension();
                        $destinationPath = public_path('/images/home/imagesSlides');
                        $image->move($destinationPath, $name);
                    }
                }
                if ($request->image !== $slide->image) {
                    $nameImage = $name;
                } else {
                    $nameImage = $request->image;
                }
                $slide->update([
                    'image' => $nameImage,
                ]);
            } else {
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $name = time() . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/images/home/imagesSlides');
                    $image->move($destinationPath, $name);
                }
                $data = imagesSlides::create([
                    'image' => $name,
                ]);
                return response()->json($data);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function postPage2(Request $request)
    {
        try {
            if (isset($request->id)) {
                $page = page2::find($request->id);
                $page->update($request->all());
            } else {
                $data = page2::create($request->all());
                return response()->json($data);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);

        }
    }

    public function postPage3(Request $request)
    {
        try {
            if (isset($request->id)) {
                $page3 = page3::find($request->id);
                if ($request->image !== $page3->image && $request->image !== null) {
                    if ($request->hasFile('image')) {
                        if ($page3->image != null) {
                            $image_path = public_path() . '/images/home/page3' . $page3->image;
                            if (file_exists($image_path)) {
                                unlink($image_path);
                            }
                        }
                        $image = $request->file('image');
                        $name = time() . '.' . $image->getClientOriginalExtension();
                        $destinationPath = public_path('/images/home/page3');
                        $image->move($destinationPath, $name);
                    }
                }
                if ($request->image !== $page3->image) {
                    $nameImage = $name;
                } else {
                    $nameImage = $request->image;
                }
                $page3->update([
                    'title' => $request->title,
                    'subtitle' => $request->subtitle,
                    'image' => $nameImage,
                ]);
            } else {
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $name = time() . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/images/home/page3');
                    $image->move($destinationPath, $name);
                }
                $data = page3::create([
                    'title' => $request->title,
                    'subtitle' => $request->subtitle,
                    'image' => $name,
                ]);
                return response()->json($data);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function postSubpage3(Request $request)
    {
        try {
            if (isset($request->id)) {
                $page = subpage3::find($request->id);
                $page->update($request->all());
            } else {
                $data = subpage3::create($request->all());
                return response()->json($data);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);

        }
    }

    public function postPage4(Request $request)
    {
        try {
            if (isset($request->id)) {
                $page = page4::find($request->id);
                $page->update($request->all());
            } else {
                $data = page4::create($request->all());
                return response()->json($data);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);

        }
    }

    public function postServices(Request $request)
    {
        try {
            if (isset($request->id)) {
                $service = services::find($request->id);
                $service->update($request->all());
            } else {
                $data = services::create($request->all());
                return response()->json($data);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);

        }
    }

    
    public function postProgress(Request $request)
    {
        try {
            if (isset($request->id)) {
                $progress = progress::find($request->id);
                $progress->update($request->all());
            } else {
                $data = progress::create($request->all());
                return response()->json($data);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);

        }
    }

    public function postPage5(Request $request)
    {
        try {
            if (isset($request->id)) {
                $page = page5::find($request->id);
                $page->update($request->all());
            } else {
                $data = page5::create($request->all());
                return response()->json($data);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);

        }
    }

    public function postSubpage5(Request $request)
    {
        try {
            if (isset($request->id)) {
                $page = subpage5::find($request->id);
                $page->update($request->all());
            } else {
                $data = subpage5::create($request->all());
                return response()->json($data);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);

        }
    }

    public function postPage6(Request $request)
    {
        try {
            if (isset($request->id)) {
                $page = page6::find($request->id);
                $page->update($request->all());
            } else {
                $data = page6::create($request->all());
                return response()->json($data);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);

        }
    }

    public function postSubpage6(Request $request)
    {
        try {
            if (isset($request->id)) {
                $page = subpage6::find($request->id);
                $page->update($request->all());
            } else {
                $data = subpage6::create($request->all());
                return response()->json($data);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);

        }
    }

    public function postPage7(Request $request)
    {
        try {
            if (isset($request->id)) {
                $page = page7::find($request->id);
                $page->update($request->all());
            } else {
                $data = page7::create($request->all());
                return response()->json($data);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);

        }
    }

    public function postNews(Request $request)
    {
        try {
            if (isset($request->id)) {
                $news = news::find($request->id);
                if ($request->image !== $news->image && $request->image !== null) {
                    if ($request->hasFile('image')) {
                        if ($news->image != null) {
                            $image_path = public_path() . '/images/home/news' . $news->image;
                            if (file_exists($image_path)) {
                                unlink($image_path);
                            }
                        }
                        $image = $request->file('image');
                        $name = time() . '.' . $image->getClientOriginalExtension();
                        $destinationPath = public_path('/images/home/news');
                        $image->move($destinationPath, $name);
                    }
                }
                $news->update([
                    'number' => $request->number,
                    'image' => $name,
                    'date' => $request->date,
                    'category_news' => $request->category_news,
                    'title' => $request->title,
                    'subtitle' => $request->subtitle,
                ]);
            } else {
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $name = time() . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/images/home/news');
                    $image->move($destinationPath, $name);
                } else {
                    $name = null;
                }
                $data = news::create([
                    'number' => $request->number,
                    'image' => $name,
                    'date' => $request->date,
                    'category_news' => $request->category_news,
                    'title' => $request->title,
                    'subtitle' => $request->subtitle,
                ]);
                return response()->json($data);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);

        }
    }
}
