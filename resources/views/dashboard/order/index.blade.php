@extends('dashboard.main.master')
@section('title','Data Order')
@section('content')
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title fw-semibold mb-0">Data Orders</h5>
                </div>
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Payment</h6></th>
                            <th class="border-bottom-0"><h6 class="fw-semibold mb-0">User</h6></th>
                            <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Product</h6></th>
                            <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Shipping</h6></th>
                            <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Total Price</h6></th>
                            <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Status</h6></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td class="border-bottom-0"><h6 class="fw-semibold mb-0">
                                    <img src="{{$order->getFirstMediaUrl('proof_of_payment', 'thumb')}}" alt="proof of payment image"  width="300px">
                                </td>
                                <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $order->user->name }}</h6></td>
                                <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $order->product->name }}</h6></td>
                                <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $order->shipping->name }}</h6></td>
                                <td class="border-bottom-0"><h6 class="fw-semibold mb-0">Rp.{{ $order->price }},00</h6></td>
                                <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $order->status }}</h6></td>
                                <td>
                                    @if($order->status == "waiting")
                                        <a href="{{ route('order-acc', $order->id) }}" class="btn btn-success">Acc</a>
                                        <a href="{{ route('order-cancel', $order->id) }}" class="btn btn-danger">Cancel</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
