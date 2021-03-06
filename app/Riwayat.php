<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    public function scopeSearch($query, $q) {
    	$query->where('nama', 'like', '%' . $q . '%')
    		->orWhere('alamat', 'like', '%' . $q . '%')
    		->orWhere('kontak', 'like', '%' . $q . '%')
    		->orWhere('email', 'like', '%' . $q . '%');
    }
}
