<?php 

namespace App\Http\Controllers;
use App\Models\Gedung;
use App\Models\AdminTransaksi;
use App\Models\Penyewaan;
use Faker;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


class AdminController extends Controller{

     function beranda(){
        $loggedUser = request()->user();
        if($loggedUser->level !='admin') return abort(404,'Anda Tidak Punya Akses');
        $data['user'] = Auth::user();
        $data['user'] = Auth::user();
        $data['gedung'] = Gedung::where('id_admin',Auth::id())->count('id');
        $data['disewa'] = Penyewaan::where('id_admin',Auth::id())->count('id');
        $data['pembayaran'] = AdminTransaksi::where('id_admin',Auth::id())->count('id');
      return view('admin.beranda',$data);
}

// ------------------------------------------------
function create(){
    $data['user'] = Auth::user();
    return view('sub-admin.gedung.create',$data);
}
function store(){
    $gedung = new Gedung;
    $gedung->nama = request('nama');
    $gedung->kategori = request('kategori');
    $gedung->harga = request('harga');
    $gedung->deskripsi = request('deskripsi');
    $gedung->alamat = request('alamat');
    $gedung->latitude = request('latitude');
    $gedung->longitude = request('longitude');
    $gedung->handleUploadFoto();
    $gedung->save();

    return redirect('sub-admin/gedung')->with('success', 'Data Berhasil ditambah');
}

function show(Produk $produk){
    $data['user'] = Auth::user();
    $data['produk'] = $produk;
    return view('admin.produk.show', $data);
}
function edit(Gedung $gedung){
    $data['gedung'] = $gedung;
    return view('sub-admin.gedung.edit', $data);

}
function update(Gedung $gedung){
   $gedung->nama = request('nama');
    $gedung->kategori = request('kategori');
    $gedung->harga = request('harga');
    $gedung->deskripsi = request('deskripsi');
    $gedung->alamat = request('alamat');
    $gedung->latitude = request('latitude');
    $gedung->longitude = request('longitude');
    $gedung->handleUploadFoto();
    $gedung->save();


    return redirect('sub-admin/gedung')->with('success', 'Data Berhasil diedit');
}
function destroy(Gedung $gedung){
    $gedung->delete();
    return redirect('sub-admin/gedung')->with('danger', 'Data Berhasil dihapus');
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


    return view('admin.produk.index', $data);
}



}