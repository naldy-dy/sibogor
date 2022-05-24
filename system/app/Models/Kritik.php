<?php

namespace App\Models;
use App\Models\Gedung;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Carbon\Carbon;


class Kritik extends Model{
    protected $table = 'kritik';

    public function getCreatedAtAttribute(){
        return Carbon::parse($this->attributes['created_at'])->format('D, d-m-Y');
    }
     


}