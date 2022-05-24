<?php 

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\CursorPaginator;
use Illuminate\Pagination\Paginator;
use App\Models\Gedung;
use App\Models\User;
use App\Models\AdminTransaksi;
use App\Models\Penyewaan;
use App\Models\Berita;
use Faker;
use Hash;
use Illuminate\Support\Str;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


class AdminProfilController extends Controller{

     function index(){
        $data['user'] = Auth::user();

        $data['list_berita'] = Berita::where('id_admin', Auth::id())->paginate(8);
      return view('admin.profil.index',$data);
}
 function update(User $user){
      $user->nama = request('nama');
      $user->email = request('email');
      $user->notlp = request('notlp');
      $user->handleUploadFoto();
      $user->save();
      return redirect('admin/profil')->with('success','Profil Berhasil Diupdate');

   }

   function change(){
      $data = request()->all();

      if(request('current')){
         $user = Auth::user();
         $check = Hash::check(request('current'), $user->password);
         if($check){
            if(request('new') == request('confirm')){

               $user->password = bcrypt(request('new'));
               $user->save();

               return back()->with('success', 'Password Berhasil Diganti');

            }else{
            return back()->with('danger', 'Password Baru Tidak cocok');

            }
         }else{
            return back()->with('danger', 'Password Sekarang Salah');
         }
         
      }else{


      }
   }


   function storeBerita(){
      $berita = new Berita;
      $berita->id_admin = Auth::id();
      $berita->judul = request('judul');
      $berita->isi = request('isi');
      $berita->handleUploadFoto();
      $berita->save();

      return back()->withInput()->with("success","Berita berhasl diupload");
   }

   function updateBerita(Berita $berita){
      $berita->id_admin = Auth::id();
      $berita->judul = request('judul');
      $berita->isi = request('isi');
      $berita->handleUploadFoto();
      $berita->save();

      return back()->withInput()->with("success","Berita berhasl diupload");
   }

   function destroyBerita(Berita $berita){
      $berita->handleDeleteFoto();
      $berita->delete();
   return back()->withInput()->with("danger","Berita berhasl diupload");
   }

}