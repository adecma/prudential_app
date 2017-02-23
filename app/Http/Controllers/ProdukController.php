<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Produk;

use App\Kriteria;

use App\Range;

use DB;

use PDF;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->input('q');

        $limit = 10;

        if ($request->has('page')) {
            $page = $request->input('page');;
        } else {
            $page = 1;
        }

        $no = ($limit*$page) - ($limit-1);

        $produks = Produk::latest()->search($q)->paginate($limit);

        $kriterias = Kriteria::pluck('title');

        return view('produk.index', compact('q', 'no', 'produks', 'kriterias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$kriterias = Kriteria::pluck('title', 'id');

        $ranges = Range::select('kriteria_id', DB::raw("GROUP_CONCAT(concat(atas, ',', bawah)) as batas"))->groupBy('kriteria_id')->get();

        return view('produk.create', compact('ranges'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  # menyiapkan rules validasi form
        //  mengambil data kriteria_id, batas atas dan bawah
        $ranges = Range::select('kriteria_id', DB::raw("GROUP_CONCAT(concat(atas, ',', bawah)) as batas"))->groupBy('kriteria_id')->get();
        // membuat collection $rules. data pertama adalah simpan rule untuk title
        $rules = collect(['title' => 'required|min:5|max:200']);
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
            $rules->offsetSet('kriteria-' . $range->kriteria_id, 'required|numeric|min:' . $first . '|max:' . $last);
        }
        // mengubah collection menjadi array
        $arrRules = $rules->toArray();
        // validasi form
        $this->validate($request, $arrRules);

        // # menyiapkan data untuk di attach
        // foreach data selain title dan _token
        foreach ($request->except(['title', '_token']) as $key => $value) {
            // memisahkan data $key dan menyimpan kedalam $label dan $id
            list($label, $id) = explode('-', $key);
            // mengambil data range berdasarkan kriteria_id
            $ranges2 = Range::where('kriteria_id', '=', $id)->get();
            //foreach $range2
            foreach ($ranges2 as $range) {
                // jika nilai yang diinputkan di form ($value) berada di dalam range
                if ($value >= $range->atas AND $value <= $range->bawah) {
                    // menyimpan kedalam variabel dan membuat nilai menjadi array
                    $nilai[$range->id] = ['nilai' => $request->input('kriteria-' . $id)];
                }
            }
                
        }        
        
        // simpan data produk
        $produk = new Produk;
        $produk->title = title_case($request->input('title'));
        $produk->save();

        // attach data nilai kedalam produk
        $produk->ranges()->attach($nilai);

        session()->flash('notifikasi', '<strong>Berhasil!</strong> Data disimpan.');

        return redirect()->route('produk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = produk::findOrFail($id);
        //$kriterias = Kriteria::pluck('title', 'id');

        $ranges = Range::select('kriteria_id', DB::raw("GROUP_CONCAT(concat(atas, ',', bawah)) as batas"))->groupBy('kriteria_id')->get();

        return view('produk.edit', compact('produk', 'ranges'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // temukan produk berdasarkan $id
        $produk = Produk::findOrFail($id);

        //  # menyiapkan rules validasi form
        //  mengambil data kriteria_id, batas atas dan bawah
        $ranges = Range::select('kriteria_id', DB::raw("GROUP_CONCAT(concat(atas, ',', bawah)) as batas"))->groupBy('kriteria_id')->get();
        // membuat collection $rules. data pertama adalah simpan rule untuk title
        $rules = collect(['title' => 'required|min:5|max:200']);
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
            $rules->offsetSet('kriteria-' . $range->kriteria_id, 'required|numeric|min:' . $first . '|max:' . $last);
        }
        // mengubah collection menjadi array
        $arrRules = $rules->toArray();
        // validasi form
        $this->validate($request, $arrRules);

        // # menyiapkan data untuk di attach
        // foreach data selain title dan _token
        foreach ($request->except(['title', '_token', '_method']) as $key => $value) {
            // memisahkan data $key dan menyimpan kedalam $label dan $id
            list($label, $id) = explode('-', $key);
            // mengambil data range berdasarkan kriteria_id
            $ranges2 = Range::where('kriteria_id', '=', $id)->get();
            //foreach $range2
            foreach ($ranges2 as $range) {
                // jika nilai yang diinputkan di form ($value) berada di dalam range
                if ($value >= $range->atas AND $value <= $range->bawah) {
                    // menyimpan kedalam variabel dan membuat nilai menjadi array
                    $nilai[$range->id] = ['nilai' => $request->input('kriteria-' . $id)];
                }
            }
                
        } 

        //dd($nilai);  

        $produk->title = title_case($request->input('title'));
        $produk->save();

        // sync data nilai kedalam produk
        $produk->ranges()->detach();
        $produk->ranges()->attach($nilai);

        session()->flash('notifikasi', '<strong>Berhasil!</strong> Data diperbaharui.');

        return redirect()->route('produk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        session()->flash('notifikasi', '<strong>Berhasil!</strong> Data dihapus.');

        return redirect()->route('produk.index');
    }

    public function cetak()
    {
        return redirect()->route('produk.pdf', time());
    }

    public function pdf($time)
    {
        $produks = Produk::orderBy('id', 'asc')->get();

        $kriterias = Kriteria::pluck('title');

        $no = 1;

        $pdf = PDF::loadView('produk.pdf',compact('produks', 'kriterias', 'no'))
            ->setPaper('a4', 'potrait');
 
        return $pdf->stream('data_produk-'.$time.'.pdf');
    }
}
