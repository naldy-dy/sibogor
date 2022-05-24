<?php

namespace App\Models;
use App\Models\Penyewaan;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Penyewaan extends Model{
    protected $table = 'penyewaan';
     use HasFactory, Notifiable;


public function getTglAttribute(){
        return Carbon::parse($this->attributes['tgl'])->format('D, d-m-Y');
    }

    public function getJamAttribute(){
        return Carbon::parse($this->attributes['jam'])->translatedFormat('H:i');
    }

function handleUploadFoto(){
        if(request()->hasFile('foto')){
            $this->handleDeleteFoto();
            $foto = request()->file('foto');
            $destination = "images/penyewaan";
            $randomStr = Str::random(5);
            $filename = $this->id_user."-".time()."-".$randomStr.".".$foto->extension();
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