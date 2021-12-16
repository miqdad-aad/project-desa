<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mutasikeluar extends Model
{
    protected $table = "mutasi_keluar";
    protected $guarded = [];

    public function penduduk()
    {
        return $this->belongsTo('App\Penduduk');
    }
}