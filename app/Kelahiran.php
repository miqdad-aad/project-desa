<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelahiran extends Model
{
    protected $table = "kelahiran";
    protected $guarded = [];

    public function agama()
    {
        return $this->belongsTo('App\Agama');
    }

    public function darah()
    {
        return $this->belongsTo('App\Darah');
    }

    public function detailDusun()
    {
        return $this->belongsTo('App\DetailDusun');
    }
}
