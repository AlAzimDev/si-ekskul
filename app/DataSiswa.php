<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class DataSiswa extends Model
{
    public function user()
    {
        return $this->hasOne('App\User','id','id_user');
    }

    protected $fillable = ['id','nama_lengkap','nama_panggilan','jenis_kelamin','tempat_lahir','tanggal_lahir','alamat','handphone','id_user'];
}
