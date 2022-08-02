<?php 

namespace App\Http\Controllers;
use App\Models\Gedung;
use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\Galeri;
use Faker;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;



class AdminGedungController extends Controller{

   function index(){
      $data['user'] = Auth::user();
      $id_admin = Auth::id();
      $data['list_gedung'] = Gedung::select('gedung.*','gedung.id as idg','kategori.icon as ic','kategori.kategori as kategori')
      ->join('kecamatan', 'kecamatan.id', '=', 'gedung.id_kecamatan')
      ->join('kategori', 'kategori.id', '=', 'gedung.id_kategori')
      ->where('id_admin',$id_admin)
      ->get();
      return view('admin.gedung.index',$data);
  }
  function create(){
    $data['user'] = Auth::user();
    $data['list_kategori'] = Kategori::all();
    $data['list_kecamatan'] = Kecamatan::all();
    return view('admin.gedung.create',$data);
}

function show(Gedung $gedung){
    $data['user'] = Auth::user();
    $data['gedung'] = $gedung;
    $data['list_gedung'] = Gedung::select('gedung')
    ->join('kategori','kategori.id','=','gedung.id_kategori')
    ->join('kecamatan','kecamatan.id','=','gedung.id_kecamatan')
    ->select('kategori.*','kecamatan.*','gedung.*')
    ->where('gedung.id',$gedung->id)
    ->get();

    $data['list_galeri'] = Galeri::where('id_gedung',$gedung->id)->get();

    return view('admin.gedung.detail',$data);
}
function store(){
    $gedung = new Gedung;
    $gedung->nama = request('nama');
    $gedung->id_admin = Auth::id();
    $gedung->id_kategori = request('kategori');
    $gedung->harga = request('harga');
    $gedung->deskripsi = request('deskripsi');
    $gedung->id_kecamatan = request('kecamatan');
    $gedung->alamat = request('alamat');
    $gedung->posisi = request('posisi');
    $gedung->handleUploadFoto();
    $gedung->save();

    return redirect('admin/gedung')->with('success', 'Data Berhasil ditambah');
}

function edit(Gedung $gedung){
    $data['list_kategori'] = Kategori::all();
    $data['list_kecamatan'] = Kecamatan::all();
    $data['user'] = Auth::user();
    $data['gedung'] = $gedung;
    $data['list_gedung'] = Gedung::select('gedung')
    ->join('kategori','kategori.id','=','gedung.id_kategori')
    ->join('kecamatan','kecamatan.id','=','gedung.id_kecamatan')
    ->select('kategori.*','kecamatan.*','gedung.*','gedung.id as idg')
    ->where('gedung.id',$gedung->id)
    ->get();
    return view('admin.gedung.edit', $data);

}
function update(Gedung $gedung){
    $gedung->nama = request('nama');
    $gedung->id_kategori = request('kategori');
    $gedung->harga = request('harga');
    $gedung->deskripsi = request('deskripsi');
    $gedung->id_kecamatan = request('id_kecamatan');
    $gedung->alamat = request('alamat');
    $gedung->posisi = request('posisi');
    $gedung->handleUploadFoto();
    $gedung->save();


    return redirect('admin/gedung')->with('success', 'Data Berhasil diedit');
}
function destroy(Gedung $gedung){
    $gedung->delete();
    return redirect('admin/gedung')->with('danger', 'Data Berhasil dihapus');
}

function destroyGaleri(Galeri $galeri){
    $galeri->handleDeleteFoto();
    $galeri->delete();
    return back()->withInput()->with('danger', 'Data Berhasil dihapus');
}

function galeri(){
    $galeri = new Galeri;
    $galeri->id_admin = Auth::id();
    $galeri->id_gedung = request('id_gedung');
    $galeri->handleUploadFoto();
    $galeri->save();

    return back()->withInput()->with('success', 'Gambar Berhasil ditambah');
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