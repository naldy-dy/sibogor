<?php

namespace App\Models;
use App\Models\Kategori;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Kategori extends Model{
	protected $table = 'kategori';
	 use HasFactory, Notifiable;

function handleUploadFoto(){
        if(request()->hasFile('icon')){
            $this->handleDeleteFoto();
            $foto = request()->file('icon');
            $destination = "images/kategori";
            $randomStr = Str::random(5);
            $filename = $this->id."-".time()."-".$randomStr.".".$foto->extension();
            $url = $foto->storeAs($destination, $filename);
            $this->icon = "app/".$url;
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