<?php 
namespace App\Http\Controllers;
use App\Models\Kecamatan;
use Faker;
use Auth;

 

class KecamatanController extends Controller{

     function index(){
        $data['user'] = Auth::user();
      $data['list_kecamatan'] = Kecamatan::all();
      return view('sub-admin.kecamatan.index',$data);
}
function create(){
    $data['user'] = Auth::user();
    return view('sub-admin.kecamatan.create',$data);
}
function store(){
    $kecamatan = new Kecamatan;
    $kecamatan->kecamatan = request('kecamatan');
    $kecamatan->geojson = request('geojson');
    $kecamatan->warna = request('warna');
    $kecamatan->save();

    return redirect('sub-admin/kecamatan')->with('success', 'Data Berhasil ditambah');
}

function edit(Kecamatan $kecamatan){
    $data['user'] = Auth::user();
    $data['kecamatan'] = $kecamatan;
    return view('sub-admin.kecamatan.edit', $data);

}
function update(Kecamatan $kecamatan){
   $kecamatan->kecamatan = request('kecamatan');
    $kecamatan->geojson = request('geojson');
    $kecamatan->warna = request('warna');
    $kecamatan->save();

    return redirect('sub-admin/kecamatan')->with('success', 'Data Berhasil diedit');
}
function destroy(Kecamatan $kecamatan){
    $kecamatan->delete();
    return redirect('sub-admin/kecamatan')->with('danger', 'Data Berhasil dihapus');
}



}