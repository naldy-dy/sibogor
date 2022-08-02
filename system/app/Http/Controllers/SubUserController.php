<?php 

namespace App\Http\Controllers;
use App\Models\Gedung;
use App\Models\User;
use Faker;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


class SubUserController extends Controller{

     function penggunaAll(){
        $data['user'] = Auth::guard('subadmin');
        $data['list_user'] = User::where('status_verifikasi', 1)->get();
      return view('sub-admin.user.all',$data);
}
 function penggunaAdmin(){
        $data['user'] = Auth::user();
        $data['list_user'] = User::where('level', 2)->get();
      return view('sub-admin.user.admin',$data);
}

 function penggunaUser(){
        $data['user'] = Auth::user();
        $data['list_user'] = User::where('level','1')->get();
      return view('sub-admin.user.user',$data);
}

}