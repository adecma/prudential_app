<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Kriteria;
use PDF;
use Validator;

class KriteriaController extends Controller
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

        $kriterias = Kriteria::latest()->search($q)->paginate($limit);

        return view('kriteria.index', compact('q', 'no', 'kriterias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $atributs = ['benefit', 'cost'];

        $kriterias = Kriteria::all();

        if ($kriterias->sum('bobot') >= 100) {
            session()->flash('danger', 'alert-danger');
            session()->flash('notifikasi', '<strong>Maaf!</strong> Bobot sudah mencapai 100.');

            return redirect()->route('kriteria.index');
        }

        return view('kriteria.create', compact('atributs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $limitBobot = $this->validateBobot('store');

        $this->validate($request, [
                'title' => 'required|min:5|max:50',
                'bobot' => 'required|numeric|min:1|max:99|limitBobot:' . $limitBobot,
                'atribut' => 'required|in:benefit,cost',
            ]);

        $kriteria = new Kriteria;
        $kriteria->title = title_case($request->input('title'));
        $kriteria->bobot = $request->input('bobot');
        $kriteria->normalisasi = $request->input('bobot')/100;
        $kriteria->atribut = $request->input('atribut');
        $kriteria->save();

        session()->flash('notifikasi', '<strong>Berhasil!</strong> Data disimpan.');

        return redirect()->route('kriteria.index');
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
        $kriteria = Kriteria::findOrFail($id);

        $atributs = ['benefit', 'cost'];

        return view('kriteria.edit', compact('kriteria', 'atributs'));
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
        $kriteria = Kriteria::findOrFail($id);

        $limitBobot = $this->validateBobot('update', $kriteria->id);

        $this->validate($request, [
                'title' => 'required|min:5|max:50',
                'bobot' => 'required|numeric|min:1|max:99|limitBobot:' . $limitBobot,
                'atribut' => 'required|in:benefit,cost',
            ]);

        $kriteria->title = title_case($request->input('title'));
        $kriteria->bobot = $request->input('bobot');
        $kriteria->normalisasi = $request->input('bobot')/100;
        $kriteria->atribut = $request->input('atribut');
        $kriteria->save();

        session()->flash('notifikasi', '<strong>Berhasil!</strong> Data diperbaharui.');

        return redirect()->route('kriteria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        $kriteria->delete();

        session()->flash('notifikasi', '<strong>Berhasil!</strong> Data dihapus.');

        return redirect()->route('kriteria.index');
    }

    public function cetak()
    {
        return redirect()->route('kriteria.pdf', time());
    }

    public function pdf($time)
    {
        $kriterias = Kriteria::latest()->get();

        $no = 1;

        $pdf = PDF::loadView('kriteria.pdf',compact('kriterias', 'no'))
            ->setPaper('a4', 'potrait');
 
        return $pdf->stream('data_kriteria-'.$time.'.pdf');
    }

    private function validateBobot($type, int $id = null)
    {
        if ($type == 'store') {
            $kriterias = Kriteria::all();
        } else {
            $kriterias = Kriteria::where('id', '!=', $id)->get();
        }

        $cacheBobot = $kriterias->sum('bobot');
        $limitBobot = 100 - $cacheBobot;

        Validator::extend('limitBobot', 
                        function($attribute, $value, $parameters, $validator){
                            return $value <= array_first($parameters);
                        }
                    , 'Bidang :attribute melampaui batas. Nilai bobot maximal ' . $limitBobot);

        return $limitBobot;
    }
}
