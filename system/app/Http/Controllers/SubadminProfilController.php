<?php 

namespace App\Http\Controllers;
use App\Models\Gedung;
use App\Models\AdminTransaksi;
use App\Models\Subadmin;
use App\Models\Penyewaan;
use Faker;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


class SubadminProfilController extends Controller{

     function index(){
        $data['user'] = Auth::user();
      return view('sub-admin.profil.index',$data);
}

function update(Subadmin $user){
      $user->nama = request('nama');
      $user->email = request('email');
      $user->notlp = request('notlp');
      $user->handleUploadFoto();
      $user->save();
      return redirect('sub-admin/profil')->with('success','Profil Berhasil Diupdate');

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



}