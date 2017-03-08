<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Produk extends Model
{
    public function ranges()
    {
    	return $this->belongsToMany('App\Range')
    		->withPivot('nilai');
    }

    public function scopeSearch($query, $q) {
    	$query->where('title', 'like', '%' . $q . '%');
    }

    public function kondisis() 
    {
    	return $this->belongsToMany('App\Kondisi');
    }
}
