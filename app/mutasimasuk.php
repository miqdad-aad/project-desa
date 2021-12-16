<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mutasimasuk extends Model
{
    protected $table = "mutasi_masuk";
    protected $guarded = [];

    public function pekerjaan()
    {
        return $this->belongsTo('App\Pekerjaan');
    }
    public function agama()
    {
        return $this->belongsTo('App\Agama');
    }
}