<?php 

namespace App\Http\Controllers;
use App\Models\Gedung;
use App\Models\Kategori;
use App\Models\Galeri;
use App\Models\Kecamatan;
use Faker;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;



class AdminBeritaController extends Controller{

     function index(){
      $data['user'] = Auth::user();
      return view('admin.profil.index',$data);
}
function create(){
    $data['user'] = Auth::user();
    $id_admin = Auth::id();
    $data['list_gedung'] = Gedung::all();
    return view('admin.galeri.create',$data);
}
function store(){
    $galeri = new Galeri;
    $galeri->id_admin = Auth::id();
    $galeri->id_gedung = request('gedung');
    $galeri->handleUploadFoto();
    $galeri->save();

    return back()->withInput()->with('success', 'Gambar Berhasil ditambah');
}
function destroy(Galeri $galeri){
    $galeri->handleDeleteFoto();
    $galeri->delete();
    return back()->withInput()->with('danger', 'Gambar Berhasil Dihapus');
}


}