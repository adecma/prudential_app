<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Kriteria;
use App\Produk;
use App\Range;
use App\Riwayat;
use PDF;
use Carbon\Carbon;

class AnalisaController extends Controller
{
    protected $dataAnalisa;

    protected function analisa($nasabah = null, $identitasNasabah = null, $limit = null)
    {
    	// mengambil data produk
    	$produks = DB::table('produk_range')
    		->join('ranges', 'produk_range.range_id', '=', 'ranges.id')
    		->select('produk_range.id', 'produk_range.produk_id', 'ranges.kriteria_id', 'produk_range.range_id', 'ranges.bobot')
    		->orderBy('produk_id', 'asc')
    		->orderBy('kriteria_id', 'asc')
    		->orderBy('range_id', 'asc')
    		->get();

        if (is_array($nasabah)) {
            foreach ($nasabah as $nas) {
                $produks->push((object) $nas);
            }            
        }
        //$produks->push((object) ['produk_id' => 'user', 'kriteria_id' => 1, 'bobot' => 30]);
        

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

        if (is_array($identitasNasabah)) {
            $listProduk->push((object) $identitasNasabah);
        }
        
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
    	// merangking dengan sort desc berdasarkan hasil dan produk_title dan simpan ke dalam properti $dataAnalisa
    	$sortHasil = $collHasil->sortByDesc(function($data) {
				    		return $data['hasil'] . ' ' . $data['produk_title'];
				    	})
    					->values();

        if (isset($limit)) {
            $hasilUser = $sortHasil->where('produk_id', '=', 'user');
            $userKey = $hasilUser->keyBy('produk_id');

            $hasilExceptUser = $sortHasil->reject(function($value, $key){
                return $value['produk_id'] == 'user';
            });

            $hasilFilter = $hasilExceptUser->filter(function($value, $key) use($userKey) {
                return $value['hasil'] <= $userKey['user']['hasil'];
            });

            $this->dataAnalisa = $hasilFilter->take($limit);
        } else {
            $this->dataAnalisa = $sortHasil;
        }
        
        // mengembalikan nilai        
        return $this->dataAnalisa;
    }

    public function index()
    {
        $rankProduk = $this->analisa();

        return view('analisa.index', compact('rankProduk'));
    }

    public function cetak()
    {
        return redirect()->route('analisa.pdf', time());
    }

    public function pdf($time)
    {
        $analisa = $this->analisa();

        $pdf = PDF::loadView('analisa.pdf',compact('analisa'))
            ->setPaper('a4', 'potrait');
 
        return $pdf->stream('data_analisa-'.$time.'.pdf');
    }

    public function konsultasi_reg()
    {
        $ranges = Range::select('kriteria_id', DB::raw("GROUP_CONCAT(concat(atas, ',', bawah)) as batas"))->groupBy('kriteria_id')->get();

        return view('konsultasi.registrasi', compact('ranges'));
    }

    public function konsultasi_store(Request $request)
    {
        //  # menyiapkan rules validasi form
        //  mengambil data kriteria_id, batas atas dan bawah
        $ranges = Range::select('kriteria_id', DB::raw("GROUP_CONCAT(concat(atas, ',', bawah)) as batas"))->groupBy('kriteria_id')->get();

        // membuat collection $rules. data pertama adalah simpan rule untuk title
        $rules = collect([
                'nama' => 'required|min:5|max:50|regex:/^[a-z\ \']*$/iu',
                'alamat' => 'required|min:5|max:140',
                'kontak' => 'required|numeric|digits_between:10,12',
                'rekomendasi' => 'required|numeric|min:3|max:10',
            ]);
        // membuat rule untuk kriteria
        foreach ($ranges as $range) {
            // memisahkan data string menjadi array
            $batas = explode(',', $range->batas);
            // mengubah array $batas menjadi collection
            $colBatas = collect($batas);
            // mengambil data pertama
            $first = $colBatas->first();
            // mengambil data terakhir
            $last = $colBatas->last();
            // membuat rule untuk kriteria dan menggabungkannya dengan collection $rules
            $rules->offsetSet('kriteria_' . $range->kriteria_id, 'required|numeric|min:' . $first . '|max:' . $last);
        }
        // mengubah collection menjadi array
        $arrRules = $rules->toArray();
        // validasi form
        $this->validate($request, $arrRules);

        $kriterias = Kriteria::all();
        
        $ranges2 = Range::all();

        foreach ($kriterias as $kriteria) {
            $rangeKriteriaSelected = $ranges2->where('kriteria_id', '=', $kriteria->id);
            foreach ($rangeKriteriaSelected as $rangeSelected) {
                 if($request->input('kriteria_' . $kriteria->id) >= $rangeSelected->atas AND $request->input('kriteria_' . $kriteria->id) <= $rangeSelected->bawah)
                 {
                    $value = [
                        'produk_id' => 'user',
                        //'nilai input' => $request->input('kriteria-' . $kriteria->id),
                        //'batas atas' => $rangeSelected->atas,
                        //'batas bawah' => $rangeSelected->bawah,
                        'range_id' => $rangeSelected->id,
                        'kriteria_id' => $kriteria->id,
                        'bobot' => $rangeSelected->bobot,
                    ];
                 }
             }

             $nasabah[] = $value;              
        }

        $identitasNasabah = [
            'id' => 'user',
            'title' => $request->input('nama'),
        ]; 

        $hasil = $this->analisa($nasabah, $identitasNasabah, $request->input('rekomendasi'));

        $riwayat = new Riwayat;
        $riwayat->nama = $request->input('nama');
        $riwayat->alamat = $request->input('alamat');
        $riwayat->kontak = $request->input('kontak');
        $riwayat->limit = $request->input('rekomendasi');

        foreach ($kriterias as $kriteria) {
            $kriteriaUser[] = [
                'kriteria' => $kriteria->title, 
                'nilai' => $request->input('kriteria_' . $kriteria->id)
            ];
        }

        $riwayat->kriteria = json_encode($kriteriaUser);
        $riwayat->hasil = json_encode($hasil);
        $riwayat->save();

        session()->flash('notifikasi', '<strong>Rekomendasi!</strong> berhasil dilakukan.');
        
        return redirect()->route('konsultasi.result', $riwayat->id);
    }

    public function konsultasi_result($id)
    {
        $riwayat = Riwayat::findOrFail($id);

        return view('konsultasi.hasil', compact('riwayat'));
    }

    public function konsultasi_cetak($id)
    {
        return redirect()->route('konsultasi.pdf', [$id, time()]);
    }

    public function konsultasi_pdf($id, $time)
    {
        $riwayat = Riwayat::findOrFail($id);

        $idProduks = collect(json_decode($riwayat->hasil))
            ->pluck('produk_id');

        $produks = Produk::whereIn('id', $idProduks)->get();

        $pdf = PDF::loadView('konsultasi.pdf',compact('riwayat', 'produks'))
            ->setPaper('a4', 'potrait');
 
        return $pdf->stream('hasil_rekomendasi-'.$id.'-'.$time.'.pdf');
    }
}
