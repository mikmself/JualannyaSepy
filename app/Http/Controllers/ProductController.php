<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('dashboard.product.index',compact('products'));
    }
    public function create(){
        $categories = ProductCategory::all();
        return view('dashboard.product.create',compact('categories'));
    }
    public function store(Request $request){
        try {
            $productData = $request->except('product_image');
            $product = Product::create($productData);
            if($request->hasFile('product_image') && $request->file('product_image')->isValid()){
                $product->addMediaFromRequest('product_image')->toMediaCollection('product_image');
            }
            return back()->with('success', 'Data berhasil dibuat');
        } catch (\Exception $error) {
            return back()->with('error', $error->getMessage());
        }
    }
    public function edit($id){
        $product = Product::find($id);
        $categories = ProductCategory::all();
        if (!$product) {
            return back()->with('error', 'Data tidak ditemukan');
        }
        return view('dashboard.product.edit',compact('product','categories'));
    }
    public function update($id, Request $request){
        try {
            $product = Product::find($id);

            if (!$product) {
                return back()->with('error', 'Data tidak ditemukan');
            }
            if ($product->getMedia('product_image')->count() > 0) {
                $product->clearMediaCollection('product_image');
            }
            $productData = $request->except('product_image');
            $product->update($productData);
            if ($request->hasFile('product_image') && $request->file('product_image')->isValid()) {
                $product->addMediaFromRequest('product_image')->toMediaCollection('product_image');
            }
            return back()->with('success', 'Data berhasil diubah');
        } catch (\Exception $error) {
            return back()->with('error', $error->getMessage());
        }
    }
    public function destroy($id){
        try {
            $product = Product::find($id);
            if (!$product) {
                return back()->with('error', 'Data tidak ditemukan');
            }
            $product->delete();
            return back()->with('success','Data berhasil dihapus');
        }catch (\Exception $error){
            return back()->with('error',$error->getMessage());
        }
    }
}
