<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request){
        $perPage = $request->get('perPage',5);
        $products = Product::paginate($perPage);

        return ProductResource::collection($products);
    }

    public function show($id) {
        $products = Product::find($id);
        return ProductResource::make($products);
    }

    public function store(Request $request) {
        $data = $request->only('product_name','photo','price','product_description');
        $products = Product::create($data);
        return ProductResource::make($products);
    }

    public function update(Request $request,$id){
        $data = $request->only('product_name','photo','price','product_description');
        $products = Product::find($id);
        $products->update($data);

        return ProductResource::make($products);
    }

    public function destroy($id) {
        $products = Product::find($id);
        $products->delete();

        return response()->json(['statu' => 'success']);
    }

    public function restore($id){
        $product = Product::withTrashed()->find($id);
        $product->restore();
        return ProductResource::make($product);
    }
    
}
