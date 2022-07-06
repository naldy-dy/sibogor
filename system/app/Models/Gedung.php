<?php

namespace App\Models;
use App\Models\Gedung;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;


class Gedung extends Model{
	protected $table = 'gedung';
	 use HasFactory, Notifiable;

      function admin(){
        return $this->belongsTo(User::class, 'id_admin');
    }
     
     

function handleUploadFoto(){
        if(request()->hasFile('foto')){
            $this->handleDeleteFoto();
            $foto = request()->file('foto');
            $destination = "images/gedung";
            $randomStr = Str::random(5);
            $filename = $this->id."-".time()."-".$randomStr.".".$foto->extension();
            $url = $foto->storeAs($destination, $filename);
            $this->foto = "app/".$url;
            $this->save;
        }
    }
    function handleDeleteFoto(){
        $foto= $this->foto;
        if($foto){
            $path = public_path($foto);
        if(file_exists($path)){
            unlink($path);

        }
    return true;
        }
    }


}