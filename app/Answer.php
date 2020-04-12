<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['id','jawaban','id_datasoal','id_user','persentasi'];
    public function datasoal()
    {
        return $this->hasOne('App\DataSoal','id','id_datasoal');
    }
}
