<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Kriteria;
use App\Produk;

class AnalisaController extends Controller
{
    public function analisa()
    {
    	// mengambil data produk
    	$produks = DB::table('produk_range')
    		->join('ranges', 'produk_range.range_id', '=', 'ranges.id')
    		->select('produk_range.id', 'produk_range.produk_id', 'ranges.kriteria_id', 'produk_range.range_id', 'ranges.bobot')
    		->orderBy('produk_id', 'asc')
    		->orderBy('kriteria_id', 'asc')
    		->orderBy('range_id', 'asc')
    		->get();

    	// mengelompokkan produk berdasarkan kriteria
    	$kriteria_produk = $produks->groupBy('kriteria_id');

    	// mengambil data kriteria
    	$kriterias = Kriteria::all();

    	foreach ($kriteria_produk as $keyKriteria => $valueProduk) {
    		//filter kriteria berdasarkan $keyKriteria produk
    		$kriteria = $kriterias->where('id', '=', $keyKriteria)->first();
    		
    		if ($kriteria->atribut == 'benefit') {
    			// jika atribut kriteria adalah benefit gunakan fungsi max
    			// menyimpan nilai kedalan variabel. Key array merukapan id kriteria
    			$kriteriaNormalisasi[$keyKriteria] = $valueProduk->max('bobot');
    			
    			foreach ($valueProduk as $produk) {
    				// menyimpan nilai kedalan variabel. Key array merukapan id kriteria dan key default array
    				$produkNormalisasi[$keyKriteria][] = $produk->bobot / $kriteriaNormalisasi[$keyKriteria];
    			}
    		} else {
    			// jika atribut kriteria adalah cost gunakan fungsi min
    			// menyimpan nilai kedalan variabel. Key array merukapan id kriteria
    			$kriteriaNormalisasi[$keyKriteria] = $valueProduk->min('bobot');

    			foreach ($valueProduk as $produk) {
    				// menyimpan nilai kedalan variabel. Key array merukapan id kriteria dan key default array
    				$produkNormalisasi[$keyKriteria][] = $kriteriaNormalisasi[$keyKriteria] / $produk->bobot;
    			}
    		}
    	}

    	// mengambil data produk
    	$listProduk = Produk::orderBy('id', 'asc')->get();

    	for ($a=0; $a < $listProduk->count() ; $a++) { 
    		foreach ($kriterias as $kriteria) { 
    			// filter kriteria berdasarkan id kriteria
    			$kriteria = $kriterias->where('id', '=', $kriteria->id)->first();
    			// kalikan nilai produk normalisasi dengan kriteria normalisasi
    			$nilai[$kriteria->id] = $produkNormalisasi[$kriteria->id][$a] * $kriteria->normalisasi;
    		}
    		// simpan produk_id, produk_title dan hasil kedalam array
    		$hasil[$a]['produk_id'] = $listProduk[$a]->id;
    		$hasil[$a]['produk_title'] = $listProduk[$a]->title;
    		$hasil[$a]['hasil'] = array_sum($nilai);
    	}

    	// membuat collection untuk variable $hasil
    	$collHasil = collect($hasil);
    	// merangking dengan sort desc berdasarkan hasil dan produk_title
    	$rankProduk = $collHasil->sortByDesc(function($data) {
				    		return $data['hasil'] . ' ' . $data['produk_title'];
				    	})
    					->values();

    	return view('analisa.index', compact('rankProduk'));
    }
}
