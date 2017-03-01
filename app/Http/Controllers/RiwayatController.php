<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Riwayat;

use DB;

use PDF;

class RiwayatController extends Controller
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

        $riwayats = Riwayat::orderBy('id', 'desc')->search($q)->paginate($limit);

        return view('riwayat.index', compact('q', 'no', 'riwayats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $riwayat = Riwayat::findOrFail($id);

        return view('riwayat.show', compact('riwayat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $riwayat = Riwayat::findOrFail($id);
        $riwayat->delete();

        session()->flash('notifikasi', '<strong>Berhasil!</strong> Data dihapus.');

        return redirect()->route('riwayat.index');
    }

    public function cetak()
    {
        return redirect()->route('riwayat.pdf', time());
    }

    public function pdf($time)
    {
        $riwayats = Riwayat::orderBy('id', 'asc')->get();

        $no = 1;

        $pdf = PDF::loadView('riwayat.pdf',compact('riwayats', 'no'))
            ->setPaper('a4', 'potrait');
 
        return $pdf->stream('data_riwayat-'.$time.'.pdf');
    }
}
