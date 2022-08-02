<?php 

namespace App\Http\Controllers;
use Auth;
use App\Models\User;
use App\Models\Subadmin;
use App\Models\Member;
use App\Models\Kecamatan;
use App\Models\Forgot;
use App\Models\Kategori;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;
use App\Mail\VarificationEmail;
use Response;
use Str;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Password;
use Crypt;
use Arr;
use Carbon\Carbon;

class AuthController extends Controller{

	function Login(){
		return view('login');
	}

	function prosesLogin(){

		if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
			$user =  Auth::User();

			if($user->level == 2 AND $user->status_verifikasi == 1){
				return redirect('admin/beranda')->with('seccess','Login Berhasil sebagai Admin');
			}elseif($user->status_verifikasi != 1){
				Auth::logout();
				return back()->with('danger', 'Akun belum terverifikasi');
			}


			if($user->level == 1 AND $user->status_verifikasi == 1){
				return redirect()->intended('')->with('success', 'Login Berhasil');
			}elseif($user->status_verifikasi != 1){
				Auth::logout();
				return back()->with('danger', 'Akun belum terverifikasi');
			}
		}

		if(Auth::guard('subadmin')->attempt(['email' => request('email'), 'password' => request('password')])){
				return redirect('sub-admin/beranda');
			}else{                           
			return back()->with('danger', 'Login Gagal, Silahkan periksa email atau password!');
		}
		
	}
	
	function otp($id){
		$uuid = Crypt::decrypt($id);
		$data['user'] = User::find($uuid);
		return view('otp',$data);
	}

	function otpwhatsapp($id){
		$uuid = Crypt::decrypt($id);
		$data['user'] = User::find($uuid);
		return view('ganti-nomor',$data);
	}

	function prosessimpannomor(User $user){
		$rand = mt_rand(100000, 999999);
		$user->notlp = request('notlp');
		$user->status_verifikasi = $rand;
		$user->save();

		$userkey = '4888efcfc685';
		$passkey = '467fd9ba6c1d7673de1cfc9b';
		$telepon = request('notlp');
		$message = '*'.$rand.'*'.' Kode otp anda, silahkan masukan ke aplikasi';
		$url = 'https://console.zenziva.net/wareguler/api/sendWA/';
		$curlHandle = curl_init();
		curl_setopt($curlHandle, CURLOPT_URL, $url);
		curl_setopt($curlHandle, CURLOPT_HEADER, 0);
		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
		curl_setopt($curlHandle, CURLOPT_POST, 1);
		curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
			'userkey' => $userkey,
			'passkey' => $passkey,
			'to' => $telepon,
			'message' => $message
		));
		$results = json_decode(curl_exec($curlHandle), true);
		curl_close($curlHandle);

		$uuid = Crypt::encrypt($user->id);
		return redirect('otp/'.$uuid)->with('success',' Kode OTP telah dikirim melalui Whatsapp ke nomor '.$telepon. ', silahkan cek Whastapp anda');
	}

	function lupapasswords(){
		return view('lupa-passwords');
	}

	function proseslupapasswords(Request $request, User $user){
		$notlp = request('notlp');
		
		$ceknomor = User::where('notlp',$notlp);
	


		if($ceknomor->count()){
			$cek = User::where('notlp',$notlp)->first()->id;
			$uuid = Crypt::encrypt($cek);
			$rand = mt_rand(100000, 999999);

			$forgot= new Forgot;
			$forgot->notlp = request('notlp');
			$forgot->kode = $rand;

			$userkey = '4888efcfc685';
			$passkey = '467fd9ba6c1d7673de1cfc9b';
			$telepon = request('notlp');
			$message = 'Kode OTP anda '.'*'.$rand.'*'.' silahkan masukan ke aplikasi';
			$url = 'https://console.zenziva.net/wareguler/api/sendWA/';
			$curlHandle = curl_init();
			curl_setopt($curlHandle, CURLOPT_URL, $url);
			curl_setopt($curlHandle, CURLOPT_HEADER, 0);
			curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
			curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
			curl_setopt($curlHandle, CURLOPT_POST, 1);
			curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
				'userkey' => $userkey,
				'passkey' => $passkey,
				'to' => $telepon,
				'message' => $message
			));
			$results = json_decode(curl_exec($curlHandle), true);
			curl_close($curlHandle);

			$forgot->save();
			return redirect('otp-passwords/'.$uuid);
		}else{
			return back()->with('danger','Nomor tidak terdaftar, silahkan periksa kembali');
		}

		
	}

	function changepasswords($id){
		$uuid = Crypt::decrypt($id);
		$data['user'] = User::find($uuid);
		return view('otp-password',$data);
	}

	function changeotppasswords(){
		$kode = request('kode');		
		$cekkode = Forgot::where('kode',$kode);
		if($cekkode->count()){
			$cekkode = Forgot::where('kode',$kode)->first()->notlp;
			$id = User::where('notlp',$cekkode)->first()->id;

			return redirect('new-passwords/'.$id)->with('success','Kode OTP berhasil, silahkan ganti password anda');
		}else{
				
			return back()->with('danger','Kode OTP salah');
		}
	}

	function newpassword($id){
		$data['user'] = User::find($id);
		return view('new-passwords',$data);
	}

	function gantiam(User $user){
		$user->password = bcrypt(request('passwords'));
		$user->save();
		return redirect('login')->with('success','Password berhasil diganti, silahkan masuk');

	}

	function updateotp(){
		$kode = Request('kode');
		$cekkode = User::where('status_verifikasi',$kode);
		if($cekkode->count()){
			User::where('status_verifikasi', $kode)
			->update([
				'status_verifikasi' =>  1,
			]);
			if(Auth::user()->level == 1){

				return redirect('/')->with('success','Selamat, Akun anda sudah terdaftar !!!');
			}else{
				return redirect('daftar-gedung')->with('silahkan daftarkan gedung anda');
			}
		}
		else{
			return back()->with('danger','Kode OTP salah, silahkan periksa kode OTP anda');
		}
	}

	function daftargedung(){
		$data['list_kategori'] = Kategori::all();
		$data['list_kecamatan'] = Kecamatan::all();
		$data['user'] = Auth::user();
		return view('daftar-gedung',$data);
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
	}else{

			// 	// end
	// } else {
		// $request->validate([
		// 	'email' => 'required|unique:user',
		// 	'notlp' => 'required|unique:user',
		// ]);

		$rand = mt_rand(100000, 999999);
		$daftar = new User;
		$daftar['nama'] = request('nama');
		$daftar['level'] = request('level');
		$daftar['notlp'] = request('notlp');
		$daftar['password'] = bcrypt(request('password'));
		$daftar['email'] = request('email');
		$daftar['status_verifikasi'] = $rand;
		$daftar->handleUploadFoto();
		$daftar->save();

		if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){

		}

		$userkey = '4888efcfc685';
		$passkey = '467fd9ba6c1d7673de1cfc9b';
		$telepon = request('notlp');
		$message = 'Kode OTP anda '.'*'.$rand.'*'.' silahkan masukan ke aplikasi';
		$url = 'https://console.zenziva.net/wareguler/api/sendWA/';
		$curlHandle = curl_init();
		curl_setopt($curlHandle, CURLOPT_URL, $url);
		curl_setopt($curlHandle, CURLOPT_HEADER, 0);
		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
		curl_setopt($curlHandle, CURLOPT_POST, 1);
		curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
			'userkey' => $userkey,
			'passkey' => $passkey,
			'to' => $telepon,
			'message' => $message
		));
		$results = json_decode(curl_exec($curlHandle), true);
		curl_close($curlHandle);
		$uuid = Crypt::encrypt($daftar->id);
		return redirect('otp/'.$uuid)->with('success',' Kode OTP telah dikirim melalui Whatsapp ke nomor '.$telepon. ', silahkan cek Whastapp anda');


	}


		
	}

	


}