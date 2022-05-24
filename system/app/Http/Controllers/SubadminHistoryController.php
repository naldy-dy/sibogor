<?php 

namespace App\Http\Controllers;
use App\Models\Gedung;
use App\Models\Kategori;
use App\Models\Penyewaan;
use App\Models\Kecamatan;
use Faker;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;



class SubadminHistoryController extends Controller{

     function index(){
      $data['user'] = Auth::user();
      $now = Carbon::yesterday();
      $data['list_penyewaan'] = Penyewaan::where('id_admin', Auth::id())->get();
      $data['list_penyewaan'] = Penyewaan::select('penyewaan')
      ->join('admin_transaksi','admin_transaksi.id','=','penyewaan.id_pembayaran')
      ->join('transaksi','transaksi.id','=','admin_transaksi.id_transaksi')
      ->join('gedung','gedung.id','=','penyewaan.id_gedung')
      ->select('penyewaan.*','penyewaan.id as idp','penyewaan.foto as bukti','penyewaan.an as nama_penyewa',
        'admin_transaksi.*','admin_transaksi.nama as an','admin_transaksi.no as nomor_transaksi',
        'transaksi.*','transaksi.nama as nama_transaksi',
        'gedung.*','gedung.nama as nama_gedung',DB::raw('(gedung.harga * penyewaan.lama) as tharga')
      )
      ->orderBy('penyewaan.id','desc')
      ->where('penyewaan.tgl','<',$now)
      ->get();
      return view('sub-admin.history.index',$data);
}

function status(Penyewaan $status){
    $status->status = request('status');
    $status->save();
     return back()->withInput()->with('success', 'Status berhasil dirubah');
}

function destroy(Penyewaan $penyewaan){
    $penyewaan->delete();
    return redirect('sub-admin/history')->with('danger', 'Data Berhasil dihapus');
}


}