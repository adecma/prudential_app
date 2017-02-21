<?php

use Illuminate\Database\Seeder;

use App\Kriteria;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	[
        		'title' => 'Premi',
        		'bobot' => 35,
        		'normalisasi' => 0.35,
        		'atribut' => 'benefit',
        	],
        	[
        		'title' => 'Petanggungan',
        		'bobot' => 25,
        		'normalisasi' => 0.25,
        		'atribut' => 'benefit',
        	],
        	[
        		'title' => 'Jangka Premi',
        		'bobot' => 15,
        		'normalisasi' => 0.15,
        		'atribut' => 'benefit',
        	],
        	[
        		'title' => 'Santunan',
        		'bobot' => 15,
        		'normalisasi' => 0.15,
        		'atribut' => 'benefit',
        	],
        	[
        		'title' => 'Masa Pertanggungan',
        		'bobot' => 10,
        		'normalisasi' => 0.1,
        		'atribut' => 'benefit',
        	],
        ];

        foreach ($data as $d) {
        	$k = new Kriteria;
        	$k->title = $d['title'];
        	$k->bobot = $d['bobot'];
        	$k->normalisasi = $d['normalisasi'];
        	$k->atribut = $d['atribut'];
        	$k->save();
        }
    }
}
