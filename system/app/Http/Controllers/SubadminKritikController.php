<?php 

namespace App\Http\Controllers;
use App\Models\Gedung;
use App\Models\Kritik;
use App\Models\AdminTransaksi;
use App\Models\Penyewaan;
use Faker;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


class SubadminKritikController extends Controller{

     function index(){
        $data['user'] = Auth::user();
        $data['list_kritik'] = Kritik::all();
      return view('sub-admin.kritik.index',$data);
}




}