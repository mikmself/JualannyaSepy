@extends('dashboard.main.master')
@section('title','Data Product')
@section('content')
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title fw-semibold mb-0">Data Product</h5>
                    <a href="{{route('product-create')}}" class="btn btn-dark">Tambah</a>
                </div>
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Id</h6></th>
                            <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Product Image</h6></th>
                            <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Name</h6></th>
                            <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Kategori</h6></th>
                            <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Description</h6></th>
                            <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Price</h6></th>
                            <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Quantity</h6></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $product->id }}</h6></td>
                                <td class="border-bottom-0"><img src="{{$product->getFirstMediaUrl('product_image', 'thumb')}}" alt="{{$product->name}} image"  width="120px"></td>
                                <td class="border-bottom-0">{{ $product->name }}</td>
                                <td class="border-bottom-0">{{ $product->category->name }}</td>
                                <td class="border-bottom-0">{{ $product->description }}</td>
                                <td class="border-bottom-0">{{ $product->price }}</td>
                                <td class="border-bottom-0">{{ $product->quantity }}</td>
                                <td>
                                    <a href="{{ route('product-edit', $product->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('product-delete', $product->id) }}" class="btn btn-danger">Hapus</a>
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
