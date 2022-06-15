<?php 

namespace App\Http\Controllers;
use Auth;
use App\Models\User;
use App\Models\Subadmin;
use App\Models\Member;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;
use App\Mail\VarificationEmail;
use Request;
use Response;


class AuthController extends Controller{

	function Login(){
		$user =  Auth::User();
		return view('login');
	}

	function prosesLogin(){

		// if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
  //           $user =  Auth::User();
  //           if($user->level == 1) return redirect()->intended('')->with('success', 'Login Berhasil');
  //           if($user->level == 2) return redirect('admin/beranda')->with('success', 'Login Berhasil');

  //       }if(Auth::guard('subadmin')->attempt(['email'=>request('email'), 'password'=>request('password')])){
  //           return redirect('sub-admin/beranda')->with('success', 'Selamat datang kembali admin, silahkan cek semua data disini');

  //       } else{
  //           return back()-> with('danger', 'Silahkan cek email dan password anda');
  //       }



		if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
			$user =  Auth::User();
			if($user->level == 'sub-admin') return redirect('sub-admin/beranda')->with('seccess','Login Berhasil sebagai Admin');
			if($user->level == 'admin') return redirect('admin/beranda')->with('seccess','Login Berhasil sebagai Admin');
			if($user->level == '1')return redirect()->intended('')->with('success', 'Login Berhasil');;
		}else{                           
			return back()->with('danger', 'Login Gagal, Silahkan periksa username atau password!');
		}
		
	}
	
	function Logout(){
		Auth::logout();
		return redirect('/');
	}

	function register(User $user){
		$data['email'] = $user;
		return view('register',$data);
	}


	function prosesDaftar(Request $request){
		// Cek email
	$user = User::where('email', request('email'));
	if ($user->count()) {
		return back()->with('danger', 'Email sudah terdaftar, Silahkan login');
		// end
	} else {
		$daftar = new User;
		$daftar['nama'] = request('nama');
		$daftar->handleUploadFoto();
		$daftar['level'] = request('level');
		$daftar['notlp'] = request('notlp');
		$daftar['password'] = bcrypt(request('password'));
		$daftar['email'] = request('email');
		$daftar->save();

		// $pendaftar = request('email');
		//  Mail::to($pendaftar)->send(new sendMail());
		return redirect('login')->with('success', 'Anda Berhasil Daftar, Silahkan Login');
	}

		
	}


}