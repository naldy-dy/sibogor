<?php

namespace App\Models;
use App\Models\Kecamatan;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Kecamatan extends Model{
	protected $table = 'kecamatan';
	 use HasFactory, Notifiable;

}