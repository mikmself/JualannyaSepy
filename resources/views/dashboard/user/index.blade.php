@extends('dashboard.main.master')
@section('title','Data User')
@section('content')
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title fw-semibold mb-0">Data User</h5>
                    <a href="{{route('user-create')}}" class="btn btn-dark">Tambah</a>
                </div>
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Id</h6></th>
                                <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Name</h6></th>
                                <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Email</h6></th>
                                <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Telephone</h6></th>
                                <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Address</h6></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{$user->id}}</h6></td>
                                <td class="border-bottom-0">{{$user->name}}</td>
                                <td class="border-bottom-0">{{$user->email}}</td>
                                <td class="border-bottom-0">{{$user->telephone}}</td>
                                <td class="border-bottom-0">{{$user->address}}</td>
                                <td>
                                    <a href="{{route('user-edit',$user->id)}}" class="btn btn-warning">Edit</a>
                                    <a href="{{route('user-delete',$user->id)}}" class="btn btn-danger">Hapus</a>
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
