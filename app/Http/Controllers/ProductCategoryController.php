<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index(){
        $productCategories = ProductCategory::all();
        return view('dashboard.product-category.index',compact('productCategories'));
    }
    public function create(){
        return view('dashboard.product-category.create');
    }
    public function store(Request $request){
        try {
            ProductCategory::create($request->all());
            return back()->with('success', 'Data berhasil dibuat');
        } catch (\Exception $error) {
            return back()->with('error', $error->getMessage());
        }
    }
    public function edit($id){
        $productCategory = ProductCategory::find($id);
        if (!$productCategory) {
            return back()->with('error', 'Data tidak ditemukan');
        }
        return view('dashboard.product-category.edit',compact('productCategory'));
    }
    public function update($id,Request $request){
        try {
            $productCategory = ProductCategory::find($id);
            if (!$productCategory) {
                return back()->with('error', 'Data tidak ditemukan');
            }
            $productCategory->update($request->all());
            return back()->with('success', 'Data berhasil diubah');
        }catch (\Exception $error){
            return back()->with('error',$error->getMessage());
        }
    }
    public function destroy($id){
        try {
            $productCategory = ProductCategory::find($id);
            if (!$productCategory) {
                return back()->with('error', 'Data tidak ditemukan');
            }
            $productCategory->delete();
            return back()->with('success','Data berhasil dihapus');
        }catch (\Exception $error){
            return back()->with('error',$error->getMessage());
        }
    }
}
