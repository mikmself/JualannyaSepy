@extends('frontend.main.master')
@section('title','Cart')
@section('content')
    <table class="table mt-5 bg-dark text-white rounded">
        <h1>Cart</h1>
        <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Product Image</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Price</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($carts as $cart)
        <tr>
            <th scope="row">{{$cart->id}}</th>
            <td><img src="{{$cart->product->getFirstMediaUrl('product_image', 'thumb')}}" alt="{{$cart->product->name}} Image" width="200px"></td>
            <td>{{$cart->product->name}}</td>
            <td>{{$cart->product->price}}</td>
            <td><a href="{{route('goCheckout',$cart->id)}}" class="btn btn-secondary">Checkout</a></td>
            <td><a href="{{route('deleteCart',$cart->id)}}" class="btn btn-danger">Delete</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
