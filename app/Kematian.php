<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kematian extends Model
{
    protected $table = "kematian";
    protected $guarded = [];

    public function penduduk()
    {
        return $this->belongsTo('App\Penduduk');
    }
}