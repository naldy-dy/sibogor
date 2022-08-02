<?php 

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Gedung;
use App\Models\Galeri;
use App\Models\Kecamatan;
use App\Models\Transaksi;
use App\Models\Penyewaan;
use App\Models\Kategori;
use App\Models\Berita;
use App\Models\Kritik;
use App\Models\Pengunjung;
use App\Models\AdminTransaksi;
use Faker;
use DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\CursorPaginator;
use Illuminate\Pagination\Paginator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use SimpleSoftwareIO\QrCode\Generator;
use SimpleSoftwareIO\QrCode\QrCodeServiceProvider;

// mail
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;
use App\Mail\sendMailBoking;



class UserController extends Controller{


  function index(Request  $request){
   $data['user'] = Auth::user();
   $data['hitung_gedung'] = Gedung::all()->count('id');
   $data['hitung_user'] = User::all()->count('id');
   $data['list_berita'] = Berita::all();

   $data['list_kecamatan'] = Kecamatan::all();
   $data['list_gedung'] = Gedung::select('gedung.*','gedung.id as idg','kategori.icon as ic','kategori.kategori as kategori')
   ->join('kecamatan', 'kecamatan.id', '=', 'gedung.id_kecamatan')
   ->join('kategori', 'kategori.id', '=', 'gedung.id_kategori')
   ->get();

//    $ip = $request->ip();
//    $now = Carbon::now()->format('d-m-Y');

// $tgl = Pengunjung::where('tanggal',$now);
// $ip = Pengunjung::where('ip',$ip);
// @dd($tgl, $ip);
  
//    $pengunjung = new Pengunjung;
//    $pengunjung->ip = $ip;
//    $pengunjung->tanggal = $now;
//    $pengunjung->save();



   return view('index', $data);
 }


 function maps(){
  $data['list_kategori'] = Kategori::all();
  $data['user'] = Auth::user();
  $data['list_kecamatan'] = Kecamatan::all();


  $data['list_gedung'] = Gedung::select('gedung.*','gedung.id as idg','kategori.icon as ic','kategori.kategori as kategori')
  ->join('kecamatan', 'kecamatan.id', '=', 'gedung.id_kecamatan')
  ->join('kategori', 'kategori.id', '=', 'gedung.id_kategori')
  ->get();

  
  $data['list_rekomendasi'] = Gedung::select('gedung.*','gedung.id as idg','kategori.icon as ic','kategori.kategori as kategori')
  ->join('kecamatan', 'kecamatan.id', '=', 'gedung.id_kecamatan')
  ->join('kategori', 'kategori.id', '=', 'gedung.id_kategori')
  ->get();
  return view('maps', $data);
}

function detail(Gedung $gedung){
  $data['gedung'] = $gedung;
  $data['list_galeri'] = Galeri::where('id_gedung',$gedung->id)->get();
  $data['list_kecamatan'] = Kecamatan::all();
  $data['list_gedung'] = Gedung::select('gedung')
  ->join('kecamatan', 'kecamatan.id', '=', 'gedung.id_kecamatan')
  ->join('kategori', 'kategori.id', '=', 'gedung.id_kategori')
  ->join('user','user.id','=','gedung.id_admin')
  ->select('kategori.*','gedung.*','user.*','user.notlp as nohp','gedung.id as idg','kategori.icon as icon','kategori.kategori as ktgr')
  ->get();
 
  return view('detail',$data);
}

function route(Gedung $gedung){
  $data['gedung'] = $gedung;
  return view('route',$data);
}

function filter(){
  $data['list_rekomendasi'] = Gedung::select('gedung.*','gedung.id as idg','kategori.icon as ic','kategori.kategori as kategori')
  ->join('kecamatan', 'kecamatan.id', '=', 'gedung.id_kecamatan')
  ->join('kategori', 'kategori.id', '=', 'gedung.id_kategori')
  ->get();
  $data['list_kategori'] = Kategori::all();
  $data['user'] = Auth::user();
  $data['list_kecamatan'] = Kecamatan::all();
  $nama = request('nama');
  $data['list_gedung'] = Gedung::where('nama','like', "%$nama%")->get();
  $data['nama'] = $nama;

  $data['list_gedung'] = Gedung::select('gedung.*','gedung.id as idg','kategori.icon as ic','kategori.kategori as kategori')
  ->join('kecamatan', 'kecamatan.id', '=', 'gedung.id_kecamatan')
  ->join('kategori', 'kategori.id', '=', 'gedung.id_kategori')
  ->where('gedung.nama','like', "%$nama%")
  ->get();
  return view('maps', $data);
}

function filterHarga(){
   $data['list_rekomendasi'] = Gedung::select('gedung.*','gedung.id as idg','kategori.icon as ic','kategori.kategori as kategori')
  ->join('kecamatan', 'kecamatan.id', '=', 'gedung.id_kecamatan')
  ->join('kategori', 'kategori.id', '=', 'gedung.id_kategori')
  ->get();
  $data['list_kategori'] = Kategori::all();
  $data['user'] = Auth::user();
  $data['list_kecamatan'] = Kecamatan::all();
  $nama = request('nama');

  $min = request('min');
  $max = request('max');
  $data['list_gedung'] = Gedung::whereBetween('harga',[$min, $max])->get();
  $data['nama'] = $nama;

  $data['list_gedung'] = Gedung::select('gedung.*','gedung.id as idg','kategori.icon as ic','kategori.kategori as kategori')
  ->join('kecamatan', 'kecamatan.id', '=', 'gedung.id_kecamatan')
  ->join('kategori', 'kategori.id', '=', 'gedung.id_kategori')
  ->whereBetween('gedung.harga',[$min, $max])
  ->get();
  return view('maps', $data);
}

function filterKategori(){
   $data['list_rekomendasi'] = Gedung::select('gedung.*','gedung.id as idg','kategori.icon as ic','kategori.kategori as kategori')
  ->join('kecamatan', 'kecamatan.id', '=', 'gedung.id_kecamatan')
  ->join('kategori', 'kategori.id', '=', 'gedung.id_kategori')
  ->get();

  $data['list_kategori'] = Kategori::all();
  $data['user'] = Auth::user();
  $data['list_kecamatan'] = Kecamatan::all();

// filter kategori
  $kategori = request('kategori');
  $data['kategori'] = $kategori;

  $data['list_gedung'] = Gedung::select('gedung.*','gedung.id as idg','kategori.icon as ic','kategori.kategori as kategori')
  ->join('kecamatan', 'kecamatan.id', '=', 'gedung.id_kecamatan')
  ->join('kategori', 'kategori.id', '=', 'gedung.id_kategori')
  ->where('gedung.id_kategori', $kategori)
  ->get();
  return view('maps', $data);
}

function kategori(Gedung $gedung){
  $data['list_kategori'] = Kategori::all();
  $data['user'] = Auth::user();
  $data['list_kecamatan'] = Kecamatan::all();
  $data['kategori'] = $gedung;

  $data['list_gedung'] = Gedung::select('gedung.*','gedung.id as idg','kategori.icon as ic','kategori.kategori as kategori')
  ->join('kecamatan', 'kecamatan.id', '=', 'gedung.id_kecamatan')
  ->join('kategori', 'kategori.id', '=', 'gedung.id_kategori')
  ->where('gedung.id_kategori',$gedung->id_kategori)
  ->get();
  return view('maps', $data);
}

// kritik dan saran-----------------------------
function kontak(){
 $data['user'] = Auth::user();
 return view('kontak',$data);
}

function storeKritik(){
  $kritik = new Kritik;
  $kritik->nama = request('nama');
  $kritik->email = request('email');
  $kritik->pesan = request('pesan');
  $kritik->save();

  return back()->withInput()->with("success","Kritik dan saran berhasil dikirim");
}



// berita----------------------------------

function berita(){
  $data['user'] = Auth::user();
  $data['list_berita'] = Berita::all();
  return view('berita',$data);
}

function detailBerita(Berita $berita){
  $data['user'] = Auth::user();
  $data['berita'] = $berita;
  return view('baca',$data);
}




function form(Gedung $gedung){
  $data['user'] = Auth::user();
  $data['now'] = Carbon::now()->format('Y/m/d');
  $data['jam'] = Carbon::now()->format('H:i');
  $id_admin = $gedung->id_admin;
  $data['gedung'] = $gedung;
  $data['list_transaksi'] = DB::table('admin_transaksi')
  ->join('transaksi', 'transaksi.id', '=', 'admin_transaksi.id_transaksi')
  ->where('id_admin',$id_admin)
  ->get();
    // $data['list_transaksi'] = AdminTransaksi::select('admin_transaksi.*')
    //     ->join('transaksi', 'transaksi.id', '=', 'admin_transaksi.id_transaksi')
    //     ->where('admin_transaksi.id_admin','=','gedung.id_admin')
    //     ->get();
  return view('form-boking', $data);
}


// mengisi form penyewaan
function formSewa(){

  // 0 = ditolak
  // 1 pesanan baru
  // 2 sudah bayar
  // 3 diterima
  // 4 masuk lapangan

  $now = Carbon::now()->format('dmY');
  $kode = "BKG".time();
  $penyewaan = new Penyewaan;
  $penyewaan->id_user = Auth::id();
  $penyewaan->id_gedung = request('id_gedung');
  $penyewaan->id_admin = request('id_admin');
  $penyewaan->id_pembayaran = request('id_pembayaran');
  $penyewaan->kode_transaksi = $kode;
  $penyewaan->an = request('an');
  $penyewaan->tgl = request('tanggal');
  $penyewaan->jam = request('jam');
  $penyewaan->lama = request('lama');
  $penyewaan->notlp = request('notlp');
  $penyewaan->status = 1;
  $penyewaan->foto = 'Belum Melakukan Pembayaran';
  $penyewaan->save();
  return redirect('pembayaran')->with('success', 'Data Berhasil ditambah');

}
// User page------------------

function beranda(){

   $loggedUser = request()->user();
        if($loggedUser->level != 1) return abort(404,'Anda Tidak Punya Akses');

  $data['user'] = Auth::user();
  $data['list_kecamatan'] = Kecamatan::all();
  $data['list_gedung'] = Gedung::select('gedung.*','gedung.id as idg','kategori.icon as ic','kategori.kategori as kategori')
  ->join('kecamatan', 'kecamatan.id', '=', 'gedung.id_kecamatan')
  ->join('kategori', 'kategori.id', '=', 'gedung.id_kategori')
  ->get();
  return view('user.beranda',$data);
}


function detail1(Gedung $gedung){
  $data['user'] = Auth::user();
  $data['gedung'] = $gedung;
  $user_id = Auth::id();
  $data['list_kecamatan'] = Kecamatan::all();
  $data['list_galeri'] = Galeri::where('id_galeri', $user_id);
  $data['list_gedung'] = Gedung::select('gedung.*','gedung.id as idg','kategori.icon as icon','kategori.kategori as kgtri')
  ->join('kecamatan', 'kecamatan.id', '=', 'gedung.id_kecamatan')
  ->join('kategori', 'kategori.id', '=', 'gedung.id_kategori')
  ->get();
  return view('user.detail',$data);
}


function formPembayaran(){
 $data['user'] = Auth::user();
 $penyewa = Auth::id();
 $now = Carbon::yesterday();
 $data['list_penyewaan'] = Penyewaan::select('penyewaan.*','penyewaan.id as idp','gedung.harga as gharga','gedung.nama as gnama','gedung.alamat as galamat','transaksi.nama as nama_transaksi','admin_transaksi.no as no_transaksi',
  DB::raw('(gedung.harga * penyewaan.lama) as tharga')) 
            // ->join('admin_transaksi','admin_transaksi.id','=','penyewaan.id_pembayaran')
 ->join('gedung', 'gedung.id', '=', 'penyewaan.id_gedung')
  ->join('admin_transaksi','admin_transaksi.id','=','penyewaan.id_pembayaran')
  ->join('transaksi','transaksi.id','=','admin_transaksi.id_transaksi')
 ->where('id_user',$penyewa)
 ->whereBetween('status', [1,3])
 ->where('tgl','>',$now)
 ->get();
 return view('user.pembayaran.index',$data);
}

function history(){
 $data['user'] = Auth::user();
 $penyewa = Auth::id();
 $now = Carbon::now();
 $data['list_penyewaan'] = Penyewaan::select('penyewaan.*','penyewaan.id as idp','gedung.harga as gharga','gedung.nama as gnama','gedung.alamat as galamat',
  DB::raw('(gedung.harga * penyewaan.lama) as tharga')) 
            // ->join('admin_transaksi','admin_transaksi.id','=','penyewaan.id_pembayaran')
 ->join('gedung', 'gedung.id', '=', 'penyewaan.id_gedung')
 ->where('id_user',Auth::id())
 ->where('tgl','>',$now)
 ->whereBetween('status', [0, 4])
 ->orderBy('tgl', 'DESC')
 ->get();
 return view('user.history.index',$data);
}

function bayar(Penyewaan $penyewa){
  $data['user'] = Auth::user();
  $data['penyewa'] = $penyewa;
  $data['list_penyewaan'] = Penyewaan::select('penyewaan')
  ->join('admin_transaksi','admin_transaksi.id','=','penyewaan.id_pembayaran')
  ->join('transaksi','transaksi.id','=','admin_transaksi.id_transaksi')
  ->join('gedung','gedung.id','=','penyewaan.id_gedung')
  ->select('penyewaan.*','penyewaan.id as idp','penyewaan.foto as bukti','penyewaan.an as nama_penyewa',
    'admin_transaksi.*','admin_transaksi.nama as an','admin_transaksi.no as nomor_transaksi',
    'transaksi.*','transaksi.nama as nama_transaksi',
    'gedung.*','gedung.nama as nama_gedung',DB::raw('(gedung.harga * penyewaan.lama) as tharga')
  )
  ->where('penyewaan.id_user', Auth::id())
  ->where('penyewaan.id','=',$penyewa->id)
  ->get();

  $data['penerima'] = Penyewaan::select('penyewaan')
  ->join('user','user.id','=','penyewaan.id_admin')
  ->where('user.id',$penyewa->id_admin)
  ->select('penyewaan.*','user.*')
  ->get();
  return view('user.pembayaran.bayar',$data);

}
function profil(){
  $data['user'] = Auth::user();
  return view('user.profil.index',$data);

}

function pemilik(User $user){
   $data['user'] = Auth::user();
  $data['pemilik'] = $user;
  return view('pemilik',$data);

}

function update(Penyewaan $penyewaan){

  $penyewaan->handleUploadFoto();
  $penyewaan->status = 2;
  $penyewaan->save();


  return redirect('pembayaran')->with('success', 'Bukti pembayaran berhasil diupload');
}


}