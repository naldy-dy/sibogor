<?php 

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Gedung;
use Faker;
use Auth;



class GedungController extends Controller{

     function index(){
        $data['user'] = Auth::user();
      $data['list_gedung'] = Gedung::select('gedung')
      ->join('user','user.id','=','gedung.id_admin')
      ->select('user.*','gedung.*','user.nama as nama_pemilik')
      ->get();
      return view('sub-admin.gedung.index',$data);
}

function indexTable(){
    $data['user'] = Auth::user();
      $data['list_gedung'] = Gedung::all();
      return view('sub-admin.gedung.table',$data);
}
function create(){
    $data['user'] = Auth::user();
    return view('sub-admin.gedung.create',$data);
}
function store(){
    // $request->validate([
    //         'nama' => 'required',
    //         'berat' => 'required'
    //     ],[
    //         'nama.required' => 'Data ini wajib diisi'

    //     ]);
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
    $data['user'] = Auth::user();
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