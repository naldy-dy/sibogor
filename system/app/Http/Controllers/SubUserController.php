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
        $data['user'] = Auth::user();
        $data['list_user'] = User::all();
      return view('sub-admin.user.all',$data);
}
 function penggunaAdmin(){
        $data['user'] = Auth::user();
        $data['list_user'] = User::where('level','admin')->get();
      return view('sub-admin.user.admin',$data);
}

 function penggunaUser(){
        $data['user'] = Auth::user();
        $data['list_user'] = User::where('level','user')->get();
      return view('sub-admin.user.user',$data);
}

}