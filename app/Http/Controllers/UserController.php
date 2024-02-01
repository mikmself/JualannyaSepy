<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('dashboard.user.index',compact('users'));
    }
    public function create(){
        return view('dashboard.user.create');
    }
    public function store(Request $request)
    {
        try {
            $request->merge(['password' => Hash::make($request->password)]);
            User::create($request->all());
            return back()->with('success', 'Data berhasil dibuat');
        } catch (\Exception $error) {
            return back()->with('error', $error->getMessage());
        }
    }

    public function edit($id){
        $user = User::find($id);
        if (!$user) {
            return back()->with('error', 'Data tidak ditemukan');
        }
        return view('dashboard.user.edit',compact('user'));
    }
    public function update($id,Request $request){
        try {
            $user = User::find($id);
            if (!$user) {
                return back()->with('error', 'Data tidak ditemukan');
            }
            $user->update($request->all());
            return back()->with('success', 'Data berhasil diubah');
        }catch (\Exception $error){
            return back()->with('error',$error->getMessage());
        }
    }
    public function destroy($id){
        try {
            $user = User::find($id);
            if (!$user) {
                return back()->with('error', 'Data tidak ditemukan');
            }
            $user->delete();
            return back()->with('success','Data berhasil dihapus');
        }catch (\Exception $error){
            return back()->with('error',$error->getMessage());
        }
    }
}
