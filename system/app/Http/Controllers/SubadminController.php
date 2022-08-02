<?php 

namespace App\Http\Controllers;
use App\Models\Gedung;
use App\Models\Subadmin;
use App\Models\Penyewaan;
use App\Models\User;
use App\Models\Kecamatan;
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

        
  $data['list_gedung'] = Gedung::select('gedung.*','gedung.id as idg','kategori.icon as ic','kategori.kategori as kategori')
  ->join('kecamatan', 'kecamatan.id', '=', 'gedung.id_kecamatan')
  ->join('kategori', 'kategori.id', '=', 'gedung.id_kategori')
  ->get();
        $data['list_kecamatan'] = Kecamatan::all();
      return view('sub-admin.beranda',$data);
    }

}