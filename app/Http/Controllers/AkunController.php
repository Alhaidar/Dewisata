<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AkunController extends Controller
{
  public function index(Request $request)
  {
    if($request->has('cari')){
      $data_akun = \App\User::where('name','LIKE','%'.$request->cari.'%')->get();
    }else{
      $data_akun = \App\USer::all();
    }
    return view('akun.index',['data_akun' => $data_akun]);
  }

  public function delete($id)
  {
    $user = \App\User::find($id);
    $user->delete();
    return redirect('/akun')->with('sukses','Data Berhasil dihapus');
  }

  public function profiladmin()
  {
    return view('akun.profiladmin');
  }

  public function edit($id)
  {
    $user = \App\User::find($id);
    return view('akun/edit',['user'=>$user]);
  }

  public function update(Request $request,$id)
  {
    // dd($request->all());
    $user = \App\User::find($id);
    $user->update($request->all());
    if($request->hasFile('avatar')){
      $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
      $user->avatar=$request->file('avatar')->getClientOriginalName();
      $user->save();
    }
      return redirect('/profiladmin')->with('sukses','Data Berhasil diupdate');
  }
}
