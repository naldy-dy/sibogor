<?php 

namespace App\Http\Controllers;
use App\Models\Gedung;
use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\Transaksi;
use App\Models\AdminTransaksi;
use Faker;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;



class AdminTransaksiController extends Controller{

     function index(){
      $data['user'] = Auth::user();
      $data['metode'] = Transaksi::all();
       $data['list_transaksi'] = AdminTransaksi::select('admin_transaksi.*','transaksi.nama as tnama','transaksi.foto as tfoto','admin_transaksi.id as idt')
            ->join('transaksi', 'transaksi.id', '=', 'admin_transaksi.id_transaksi')
            ->where('id_admin', Auth::id())
            ->get();
      return view('admin.transaksi.index',$data);
}
function create(){
    $data['user'] = Auth::user();
    $data['list_transaksi'] = Transaksi::all();
    return view('admin.transaksi.create',$data);
}
function store(){
    $transaksi = new AdminTransaksi;
    $transaksi->id_admin = Auth::id();
    $transaksi->id_transaksi = request('id_transaksi');
    $transaksi->nama = request('nama');
    $transaksi->no = request('no');
    $transaksi->save();

    return redirect('admin/transaksi')->with('success', 'Data Berhasil ditambah');

}
function update(AdminTransaksi $admintranasksi){
    $admintranasksi->id_transaksi = request('id_transaksi');
    $admintranasksi->nama = request('nama');
    $admintranasksi->no = request('no');
    $admintranasksi->save();

    return back()->with('success', 'Data Berhasil diedit');
}
function destroy(AdminTransaksi $admintranasksi){
    $admintranasksi->delete();
    $admintranasksi->handleDeleteFoto();
    return back()->with('danger', 'Data Berhasil dihapus');
}


// -------Tombol Pencarian-----------------------
function filter(){
 		// where
    $nama = request('nama');
    $data['list_produk'] = Produk::where('nama','like', "%$nama%")->get();
    $data['nama'] = $nama;

 		// whereIn
    $stok = explode(" ",request('stok'));
    $data['list_produk'] = Produk::whereIn('stok', $stok)->get();
    $data['stok'] = request('stok');

 		// whereBetween
    $harga_min = request('harga_min');
    $harga_max = request('harga_max');
    $data['list_produk'] = Produk::whereBetween('harga',[$harga_min, $harga_max])->get();  


    return view('sub-admin.produk.index', $data);
}



}