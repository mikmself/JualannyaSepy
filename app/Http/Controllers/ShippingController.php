<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function index(){
        $shippings = Shipping::all();
        return view('dashboard.shipping.index',compact('shippings'));
    }
    public function create(){
        return view('dashboard.shipping.create');
    }
    public function store(Request $request){
        try {
            Shipping::create($request->all());
            return back()->with('success', 'Data berhasil dibuat');
        } catch (\Exception $error) {
            return back()->with('error', $error->getMessage());
        }
    }
    public function edit($id){
        $shipping = Shipping::find($id);
        if (!$shipping) {
            return back()->with('error', 'Data tidak ditemukan');
        }
        return view('dashboard.shipping.edit',compact('shipping'));
    }
    public function update($id,Request $request){
        try {
            $shipping = Shipping::find($id);
            if (!$shipping) {
                return back()->with('error', 'Data tidak ditemukan');
            }
            $shipping->update($request->all());
            return back()->with('success', 'Data berhasil diubah');
        }catch (\Exception $error){
            return back()->with('error',$error->getMessage());
        }
    }
    public function destroy($id){
        try {
            $shipping = Shipping::find($id);
            if (!$shipping) {
                return back()->with('error', 'Data tidak ditemukan');
            }
            $shipping->delete();
            return back()->with('success','Data berhasil dihapus');
        }catch (\Exception $error){
            return back()->with('error',$error->getMessage());
        }
    }
}
