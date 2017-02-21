<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Range extends Model
{
    public function kriteria()
    {
    	return $this->belongsTo('App\Kriteria');
    }

    public function produks()
    {
    	return $this->belongsToMany('App\Produk');
    }

    public function scopeFilter($query, $q) {
    	$query->where('kriteria_id', 'like', '%' . $q . '%');
    }
}
