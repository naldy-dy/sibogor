<?php 

namespace App\Http\Controllers;
use App\Models\Gedung;
use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\Transaksi;
use Faker;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;



class TransaksiController extends Controller{

     function index(){
      $data['user'] = Auth::user();
      $data['list_transaksi'] = Transaksi::all();
      return view('sub-admin.transaksi.index',$data);
}
function create(){
    $data['user'] = Auth::user();
    return view('sub-admin.transaksi.create',$data);
}
function store(){
    $data['user'] = Auth::user();
    $transaksi = new Transaksi;
    $transaksi->nama = request('nama');
    $transaksi->handleUploadFoto();
    $transaksi->save();

    return redirect('sub-admin/transaksi')->with('success', 'Data Berhasil ditambah');
}
function edit(Transaksi $transaksi){
    $data['user'] = Auth::user();
    $data['transaksi'] = $transaksi;
    return view('sub-admin.transaksi.edit', $data);

}
function update(Transaksi $transaksi){
    $transaksi->nama = request('nama');
    $transaksi->handleUploadFoto();
    $transaksi->save();

    return redirect('sub-admin/transaksi')->with('success', 'Data Berhasil diedit');
}
function destroy(Transaksi $transaksi){
    $transaksi->delete();
    $transaksi->handleDeleteFoto();
    return redirect('sub-admin/transaksi')->with('danger', 'Data Berhasil dihapus');
}



}