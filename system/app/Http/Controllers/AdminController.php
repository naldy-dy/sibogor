<?php 

namespace App\Http\Controllers;
use App\Models\Gedung;
use App\Models\AdminTransaksi;
use App\Models\Penyewaan;
use Faker;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;


class AdminController extends Controller{

     function beranda(){
        $loggedUser = request()->user();
        if($loggedUser->level != 2 AND $loggedUser->status_verifikasi !=1) return abort(404,'Anda Tidak Punya Akses');
        $data['user'] = Auth::user();
        $data['gedung'] = Gedung::where('id_admin',Auth::id())->count('id');
        $data['disewa'] = Penyewaan::where('id_admin',Auth::id())->count('id');
        $data['pembayaran'] = AdminTransaksi::where('id_admin',Auth::id())->count('id');

        $now = Carbon::now()->format('Y-m-d');
        $data['list_pesanan'] = Penyewaan::where('id_admin', Auth::id())->where('tgl', $now)->where('status', 3)->get();
      return view('admin.beranda',$data);
}


 function terima($kode){
 	Penyewaan::where('kode_transaksi', $kode)
       ->update([
           'status' =>  4
        ]);
       return back()->with('success','Berhasil diupdate');
 }

}