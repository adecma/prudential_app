<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    public function ranges()
    {
    	return $this->hasMany('App\Range');
    }

    public function scopeSearch($query, $q) {
    	$query->where('title', 'like', '%' . $q . '%')
    		->orWhere('atribut', 'like', '%' . $q . '%');
    }
}
