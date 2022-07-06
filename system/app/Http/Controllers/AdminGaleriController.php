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



class AdminGaleriController extends Controller{

function index(){
      $data['list_galeri'] = Galeri::where('id_admin', Auth::id())->get();
      $data['list_gedung'] = Gedung::where('id_admin', Auth::id())->get();
      return view('admin.galeri.index',$data);
}

function store(Request $request){

   $validated = $request->validate([
        'foto' => 'required|unique:galeri|max:3000',
    ]);
    $galeri = new Galeri;
    $galeri->id_admin = Auth::id();
    $galeri->id_gedung = request('id_gedung');
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