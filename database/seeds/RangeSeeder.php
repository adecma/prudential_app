<?php

use Illuminate\Database\Seeder;

use App\Range;
use App\Kriteria;

class RangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataPremi = [
        	[
        		'atas' => 1,
                'bawah' => 399999,
        		'variabel' => 'Sangat Rendah',
        		'bobot' => 5,
        	],
        	[
        		'atas' => 400000,  
                'bawah' => 749999,
        		'variabel' => 'Rendah',
        		'bobot' => 25,
        	],
        	[
        		'atas' => 750000,
                'bawah' => 999999,
        		'variabel' => 'Sedang',
        		'bobot' => 50,
        	],
        	[
        		'atas' => 1000000,
                'bawah' => 1999999,
        		'variabel' => 'Tinggi',
        		'bobot' => 75,
        	],
        	[
        		'atas' => 2000000,
                'bawah' => 3000000,
        		'variabel' => 'Sangat Tinggi',
        		'bobot' => 100,
        	],
        ];

        $dataPertanggungan = [
        	[
        		'atas' => 1,        		
                'bawah' => 9999999,
        		'variabel' => 'Sangat Rendah',
        		'bobot' => 5,
        	],
        	[
        		'atas' => 10000000,        		
                'bawah' => 49999999,
        		'variabel' => 'Rendah',
        		'bobot' => 25,
        	],
        	[
        		'atas' => 50000000,        		
                'bawah' => 99999999,
        		'variabel' => 'Sedang',
        		'bobot' => 50,
        	],
        	[
        		'atas' => 100000000,        		
                'bawah' => 199999999,
        		'variabel' => 'Tinggi',
        		'bobot' => 75,
        	],
        	[
        		'atas' => 200000000,        		
                'bawah' => 300000000,
        		'variabel' => 'Sangat Tinggi',
        		'bobot' => 100,
        	],
        ];

        $dataJangkaPremi = [
        	[
        		'atas' => 1,        		
                'bawah' => 9,
        		'variabel' => 'Sangat Rendah',
        		'bobot' => 5,
        	],
        	[
        		'atas' => 10,        		
                'bawah' => 14,
        		'variabel' => 'Rendah',
        		'bobot' => 25,
        	],
        	[
        		'atas' => 15,        		
                'bawah' => 24,
        		'variabel' => 'Sedang',
        		'bobot' => 50,
        	],
        	[
        		'atas' => 25,        		
                'bawah' => 34,
        		'variabel' => 'Tinggi',
        		'bobot' => 75,
        	],
        	[
        		'atas' => 35,        		
                'bawah' => 50,
        		'variabel' => 'Sangat Tinggi',
        		'bobot' => 100,
        	],
        ];

        $dataSantunan = [
        	[
        		'atas' => 1,        		
                'bawah' => 9999999,
        		'variabel' => 'Sangat Rendah',
        		'bobot' => 5,
        	],
        	[
        		'atas' => 10000000,        		
                'bawah' => 19999999,
        		'variabel' => 'Rendah',
        		'bobot' => 25,
        	],
        	[
        		'atas' => 20000000,        		
                'bawah' => 49999999,
        		'variabel' => 'Sedang',
        		'bobot' => 50,
        	],
        	[
        		'atas' => 50000000,        		
                'bawah' => 99999999,
        		'variabel' => 'Tinggi',
        		'bobot' => 75,
        	],
        	[
        		'atas' => 100000000,        		
                'bawah' => 150000000,
        		'variabel' => 'Sangat Tinggi',
        		'bobot' => 100,
        	],
        ];

        $dataMasaPertanggungan  = [
        	[
        		'atas' => 1,        		
                'bawah' => 9,
        		'variabel' => 'Sangat Rendah',
        		'bobot' => 5,
        	],
        	[
        		'atas' => 10,        		
                'bawah' => 14,
        		'variabel' => 'Rendah',
        		'bobot' => 25,
        	],
        	[
        		'atas' => 15,        		
                'bawah' => 24,
        		'variabel' => 'Sedang',
        		'bobot' => 50,
        	],
        	[
        		'atas' => 25,        		
                'bawah' => 34,
        		'variabel' => 'Tinggi',
        		'bobot' => 75,
        	],
        	[
        		'atas' => 35,        		
                'bawah' => 50,
        		'variabel' => 'Sangat Tinggi',
        		'bobot' => 100,
        	],
        ];

        $premi = Kriteria::find(1);
        foreach ($dataPremi as $d) {
        	$k = new Range;
        	$k->kriteria_id = $premi->id;
        	$k->atas = $d['atas'];
            $k->bawah = $d['bawah'];
        	//$k->variabel = $d['variabel'];
        	$k->bobot = $d['bobot'];
        	$k->save();
        }

        $pertanggungan = Kriteria::find(2);
        foreach ($dataPertanggungan as $d) {
        	$k = new Range;
        	$k->kriteria_id = $pertanggungan->id;
        	$k->atas = $d['atas'];
            $k->bawah = $d['bawah'];
        	//$k->variabel = $d['variabel'];
        	$k->bobot = $d['bobot'];
        	$k->save();
        }

        $jangkaPremi = Kriteria::find(3);
        foreach ($dataJangkaPremi as $d) {
        	$k = new Range;
        	$k->kriteria_id = $jangkaPremi->id;
        	$k->atas = $d['atas'];
            $k->bawah = $d['bawah'];
        	//$k->variabel = $d['variabel'];
        	$k->bobot = $d['bobot'];
        	$k->save();
        }

        $santunan = Kriteria::find(4);
        foreach ($dataSantunan as $d) {
        	$k = new Range;
        	$k->kriteria_id = $santunan->id;
        	$k->atas = $d['atas'];
            $k->bawah = $d['bawah'];
        	//$k->variabel = $d['variabel'];
        	$k->bobot = $d['bobot'];
        	$k->save();
        }

        $masaPertanggungan = Kriteria::find(5);
        foreach ($dataMasaPertanggungan as $d) {
        	$k = new Range;
        	$k->kriteria_id = $masaPertanggungan->id;
        	$k->atas = $d['atas'];
            $k->bawah = $d['bawah'];
        	//$k->variabel = $d['variabel'];
        	$k->bobot = $d['bobot'];
        	$k->save();
        }
    }
}
