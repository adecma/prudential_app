<?php

use Illuminate\Database\Seeder;

use App\Produk;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	['title' => 'PRUcrisis cover 34'],
			['title' => 'PRUcrisis cover benefit plus 61'],
			['title' => 'PRUcrisis cover benefit plus syatriah 61'],
			['title' => 'PRUcrisis cover syariah 34'],
			['title' => 'PRUcrisis income'],
			['title' => 'PRUcrisis income syariah'],
			['title' => 'PRUearly stage crisis cover'],
			['title' => 'PRUearly stage crisis cover plus'],
			['title' => 'PRUearly stage crisis cover plus syariah'],
			['title' => 'PRUearly stage parent payor'],
			['title' => 'PRUearly stage parent payor syariah'],
			['title' => 'PRUearly stage payor'],
			['title' => 'PRUearly stage payor syariah'],
			['title' => 'PRUearly stage spouse payor'],
			['title' => 'PRUearly stage spouse payor syariah'],
			['title' => 'PRUhospital & surgical cover plus'],
			['title' => 'PRUhospital & surgical cover plus syariah'],
			['title' => 'PRUjuvenile crisis cover'],
			['title' => 'PRUjuvenile crisis cover syariah'],
			['title' => 'PRUlink term'],
			['title' => 'PRUlink term syariah'],
			['title' => 'PRUmed cover'],
			['title' => 'PRUmed cover syariah'],
			['title' => 'PRUmultiple crisis cover'],
			['title' => 'PRUmultiple crisis cover syariah'],
			['title' => 'PRUparent payor 33'],
			['title' => 'PRUparent payor syariah 33'],
			['title' => 'PRUpayor 33'],
			['title' => 'PRUpayor syariah 33'],
			['title' => 'PRUpersonal accident death'],
			['title' => 'PRUpersonal accident death plus'],
			['title' => 'PRUpersonal accident death & disablement'],
			['title' => 'PRUpersonal accident death & disablement syariah'],
			['title' => 'PRUpersonal accident death and disablement plus'],
			['title' => 'PRUpersonal accident death and disablement plus syariah'],
			['title' => 'PRUpersonal accident death plus syariah'],
			['title' => 'PRUpersonal accident death syariah'],
			['title' => 'PRUspouse payor 33'],
			['title' => 'PRUspouse payor syariah 33'],
			['title' => 'PRUspouse waiver 33'],
			['title' => 'PRUcrisis cover syariah 34'],
			['title' => 'PRUspouse waiver syariah 33'],
			['title' => 'PRUwaiver syariah 33'],
        ];

        foreach ($data as $d) {
        	$p = new Produk;
        	$p->title = $d['title'];
        	$p->save();
        }
    }
}
