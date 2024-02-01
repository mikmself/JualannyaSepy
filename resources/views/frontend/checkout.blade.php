@extends('frontend.main.master')
@section('title','Cart')
@section('content')
    <div class="container bg-dark mt-5 p-3 rounded text-white">
        <h1 class="text-white">Checkout</h1>
        <form action="{{route('checkout')}}" method="post">
            @csrf
            <input type="hidden" name="product_id" value="{{$product->id}}">
            <div class="form-row">
                <div class="form-group mt-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Name" value="{{auth()->user()->name}}" disabled>
                </div>
                <div class="form-group mt-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Email" value="{{auth()->user()->email}}" disabled>
                </div>
            </div>
            <div class="form-group mt-3">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" placeholder="Address" value="{{auth()->user()->address}}" disabled>
            </div>
            <div class="form-row">
                <div class="form-group mt-3">
                    <label for="productName">Product Name</label>
                    <input type="text" class="form-control" id="productName" value="{{$product->name}}" disabled>
                </div>
                <div class="form-group mt-3">
                    <label for="productName">Product Price</label>
                    <input type="text" class="form-control" id="productName" value="{{$product->price}}" disabled>
                </div>
                <div class="form-group mt-3">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity">
                </div>
                <div class="form-group mt-3">
                    <label for="shipping">Shipping</label>
                    <select id="shipping" class="form-control" name="shipping_id">
                        @foreach($shippings as $shipping)
                            <option value="{{$shipping->id}}">{{$shipping->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3 mb-3">Submit</button>
        </form>
    </div>
@endsection
