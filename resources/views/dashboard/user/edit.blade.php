@extends('dashboard.main.master')
@section('title','Tambah Data User')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Forms</h5>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('user-update',$user->id)}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" autocomplete="false" required value="{{$user->name}}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" autocomplete="false" required value="{{$user->email}}">
                        </div>
                        <div class="mb-3">
                            <label for="telephone" class="form-label">Telephone</label>
                            <input type="text" name="telephone" class="form-control" autocomplete="false" required value="{{$user->telephone}}">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" autocomplete="false" required value="{{$user->address}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{route('user-index')}}" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
