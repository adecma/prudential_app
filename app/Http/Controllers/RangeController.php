<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Range;
use App\Kriteria;

use PDF;

class RangeController extends Controller
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

        $ranges = Range::orderBy('id', 'asc')->filter($q)->paginate($limit);

        $kriterias = Kriteria::orderBy('id', 'asc')->pluck('title', 'id');

        return view('range.index', compact('q', 'no', 'ranges', 'kriterias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kriterias = Kriteria::orderBy('id', 'asc')->pluck('title', 'id');

        return view('range.create', compact('kriterias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'kriteria' => 'required',
                'atas' => 'required|numeric',
                'bawah' => 'required|numeric',
                'bobot' => 'required|numeric|min:1|max:100',
            ]);

        $range = new Range;
        $range->kriteria_id = $request->input('kriteria');
        $range->atas = $request->input('atas');
        $range->bawah = $request->input('bawah');
        $range->bobot = $request->input('bobot');
        $range->save();

        session()->flash('notifikasi', '<strong>Berhasil!</strong> Data disimpan.');

        return redirect()->route('range.index');
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
        $range = Range::findOrFail($id);

        $kriterias = Kriteria::orderBy('id', 'asc')->pluck('title', 'id');

        return view('range.edit', compact('range', 'kriterias'));
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
        $range = Range::findOrFail($id);

        $this->validate($request, [
                'kriteria' => 'required',
                'atas' => 'required|numeric',
                'bawah' => 'required|numeric',
                'bobot' => 'required|numeric|min:1|max:100',
            ]);

        $range->kriteria_id = $request->input('kriteria');
        $range->atas = $request->input('atas');
        $range->bawah = $request->input('bawah');
        $range->bobot = $request->input('bobot');
        $range->save();

        session()->flash('notifikasi', '<strong>Berhasil!</strong> Data diperbaharui.');

        return redirect()->route('range.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $range = Range::findOrFail($id);
        $range->delete();

        session()->flash('notifikasi', '<strong>Berhasil!</strong> Data dihapus.');

        return redirect()->route('range.index');
    }

    public function cetak()
    {
        return redirect()->route('range.pdf', time());
    }

    public function pdf($time)
    {
        $ranges = Range::orderBy('id', 'asc')->get();

        $no = 1;

        $pdf = PDF::loadView('range.pdf',compact('ranges', 'no'))
            ->setPaper('a4', 'potrait');
 
        return $pdf->stream('data_range-'.$time.'.pdf');
    }
}
