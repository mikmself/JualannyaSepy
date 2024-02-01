@extends('dashboard.main.master')
@section('title','Edit Data Shipping')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Forms</h5>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('shipping-update', $shipping->id) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" autocomplete="false" required value="{{ $shipping->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" name="price" class="form-control" autocomplete="false" required value="{{ $shipping->price }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('shipping-index') }}" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection