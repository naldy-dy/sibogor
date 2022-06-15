<?php 

namespace App\Http\Controllers;
use App\Models\Gedung;
use App\Models\Subadmin;
use App\Models\Penyewaan;
use App\Models\User;
use Faker;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


class SubadminController extends Controller{

     function beranda(){
        $data['user'] = Auth::user();
        $data['gedung'] = Gedung::all()->count('id');
		$data['penyewaan'] = Penyewaan::all()->count('id');
        $data['pengguna'] = User::where('level','user')->count('id');
        $data['admin'] = User::where('level','admin')->count('id');
      return view('sub-admin.beranda',$data);
    }

}