<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ourproducts;
use App\Models\ourproductscategory;
use Illuminate\Http\Request;

class OurProductsController extends Controller
{
    public function getDataProducts()
    {
        $products = ourproducts::all();
        $category = ourproductscategory::all();
        $data = [];
        foreach ($products as $product) {
            $data[] = [
                'id' => $product->id,
                'name_prod' => $product->name_prod,
                'img_prod' => $product->img_prod,
                'desc_prod' => $product->desc_prod,
                'category_id' => $product->category_id,
                'category' => $category->where('id', $product->category_id)->first()->name_cat,
            ];
        }
        return response()->json($data);
    }

    public function getDataCategory()
    {
        return response()->json(ourproductscategory::all());
    }

    public function postOurProducts(Request $request)
    {
        try {
            if(isset($request->id)){
                $product = ourproducts::find($request->id);
                if ($request->image !== $product->image && $request->image !== null) {
                    if ($request->hasFile('image')) {
                        if ($product->img_prod != null) {
                            $image_path = public_path() . '/images/ourproducts/products/' . $product->img_prod;
                            if (file_exists($image_path)) {
                                unlink($image_path);
                            }
                        }
                        $image = $request->file('image');
                        $name = time() . '.' . $image->getClientOriginalExtension();
                        $destinationPath = public_path('/images/ourproducts/products');
                        $image->move($destinationPath, $name);
                    }
                }
                $product->update([
                    'img_prod' => $name,
                    'name_prod' => $request->name_prod,
                    'desc_prod' => $request->desc_prod,
                    'category_id' => $request->category_id,
                ]);
            }else{
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $name = time() . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/images/ourproducts/products');
                    $image->move($destinationPath, $name);
                }
                $product = ourproducts::create([
                    'img_prod' => $name,
                    'name_prod' => $request->name_prod,
                    'desc_prod' => $request->desc_prod,
                    'category_id' => $request->category_id,
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()]);
        }
    }

    public function postOurProductsDelete(Request $request)
    {
        try {
            $product = ourproducts::find($request->id);
            if ($product->img_prod != null) {
                $image_path = public_path() . '/images/ourproducts/products/' . $product->img_prod;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            $product->delete();
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()]);
        }
    }
    
    public function postOurCategory(Request $request)
    {
        try {
            if(isset($request->id)){
                $category = ourproductscategory::find($request->id);
                $category->update($request->all());
            }else{
                $category = ourproductscategory::create($request->all());
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()]);
        }
    }

    public function postOurCategoryDelete(Request $request)
    {
        try {
            $category = ourproductscategory::find($request->id);
            $category->delete();
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()]);
        }
    }
}
