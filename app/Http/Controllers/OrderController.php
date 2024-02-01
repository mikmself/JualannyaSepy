<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
        return view('dashboard.order.index',compact('orders'));
    }
    public function acc($id){
        try {
            $order = Order::find($id);
            if (!$order) {
                return back()->with('error', 'Data tidak ditemukan');
            }
            $order->update(['status' => 'paid']);
            return back()->with('success','Pembelian berhasil dikonfirmasi');
        }catch (\Exception $error){
            return back()->with('error',$error->getMessage());
        }
    }
    public function cancel($id){
        try {
            $order = Order::find($id);
            if (!$order) {
                return back()->with('error', 'Data tidak ditemukan');
            }
            $order->update(['status' => 'canceled']);
            return back()->with('success','Pembelian berhasil dicancel');
        }catch (\Exception $error){
            return back()->with('error',$error->getMessage());
        }
    }
}
