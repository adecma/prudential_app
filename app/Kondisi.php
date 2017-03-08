<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kondisi extends Model
{
    public function produks()
    {
    	return $this->belongsToMany('App\Produk');
    }
}
