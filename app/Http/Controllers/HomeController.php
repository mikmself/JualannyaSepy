<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        return view('frontend.home');
    }
    public function product()
    {
        $products = Product::all();
        return view('frontend.product',compact('products'));
    }
    public function cart(){
        $carts = Cart::where('user_id',Auth::user()->id)->get();
        return view('frontend.cart',compact('carts'));
    }
    public function order(){
        $orders = Order::where('user_id',Auth::user()->id)->get();
        return view('frontend.order',compact('orders'));
    }
    public function addToCart($id){
        try {
            Cart::create([
                'user_id' => Auth::user()->id,
                'product_id' => $id
            ]);
            return back()->with('success','Berhasil menambahkan product ke cart');
        }catch (\Exception $error) {
            return back()->with('error',$error->getMessage());
        }
    }
    public function deleteCart($id){
        try {
            $order = Cart::find($id);
            if (!$order) {
                return back()->with('error', 'Data tidak ditemukan');
            }
            $order->delete();
            return back()->with('success','Data berhasil dihapus');
        }catch (\Exception $error){
            return back()->with('error',$error->getMessage());
        }
    }
    public function goCheckout($id){
        try {
            $product = Product::find($id);
            $shippings = Shipping::all();
            if (!$product) {
                return back()->with('error', 'Data tidak ditemukan');
            }
            return view('frontend.checkout',compact('product','shippings'));
        }catch (\Exception $error){
            return back()->with('error',$error->getMessage());
        }
    }
    public function checkout(Request $request){
        try {
            $user_id = Auth::user()->id;
            $product = Product::where('id', $request->product_id)->first();
            $shipping = Shipping::where('id', $request->shipping_id)->first();
            $price = ($product->price * $request->quantity) + $shipping->price;

            $order = new Order();
            $order->user_id = $user_id;
            $order->product_id = $request->product_id;
            $order->shipping_id = $request->shipping_id;
            $order->quantity = $request->quantity;
            $order->price = $price;
            $order->save();
            Cart::where('user_id', Auth::user()->id)
                ->where('product_id', $order->product_id)
                ->delete();
            return back()->with('success', 'Berhasil checkout product');
        } catch (\Exception $error) {
            return back()->with('error', $error->getMessage());
        }
    }
    public function pay(Request $request){
        try {
            $order = Order::find($request->order_id);
            if (!$order) {
                return back()->with('error', 'Data tidak ditemukan');
            }
            if ($request->hasFile('proof_of_payment') && $request->file('proof_of_payment')->isValid()) {
                $order->addMediaFromRequest('proof_of_payment')->toMediaCollection('proof_of_payment');
            }
            $order->update(['status' => 'waiting']);
            return back()->with('success', 'Berhasil melakukan transaksi pembayaran');
        }catch (\Exception $error){
            return back()->with('error',$error->getMessage());
        }
    }
}
