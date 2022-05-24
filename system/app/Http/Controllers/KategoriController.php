<?php 

namespace App\Http\Controllers;
use App\Models\Kategori;
use Faker;
use Auth;



class KategoriController extends Controller{

   function index(){
    $data['user'] = Auth::user();
      $data['list_kategori'] = Kategori::all();
      return view('sub-admin.kategori.index',$data);
  }


  function create(){
    $data['user'] = Auth::user();
    return view('sub-admin.kategori.create',$data);
}
function store(){
    $kategori = new Kategori;
    $kategori->kategori = request('kategori');
    $kategori->handleUploadFoto();
    $kategori->save();

    return redirect('sub-admin/kategori')->with('success', 'Data Berhasil ditambah');
}

function show(Kategori $produk){
    $data['user'] = Auth::user();
    $data['produk'] = $produk;
    return view('admin.produk.show', $data);
}

function edit(Kategori $kategori){
    $data['user'] = Auth::user();
    $data['kategori'] = $kategori;
    return view('sub-admin.kategori.edit', $data);

}
function update(Kategori $kategori){
    $kategori->kategori = request('kategori');
    $kategori->handleUploadFoto();
    $kategori->save();


 return redirect('sub-admin/kategori')->with('success', 'Data Berhasil diedit');
}
function destroy(Kategori $kategori){
    $kategori->delete();
    return redirect('sub-admin/kategori')->with('danger', 'Data Berhasil dihapus');
}

}