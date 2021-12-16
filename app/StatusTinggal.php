<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusTinggal extends Model
{
    protected $table = "status_tinggal";
    protected $guarded = [];

    public function penduduk()
    {
        return $this->hasMany('App\Penduduk');
    }
}