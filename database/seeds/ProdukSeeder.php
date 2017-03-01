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
        	[
        		'title' => 'PRUcrisis cover 34',
        		'keterangan' => 'Tertanggung utama telah memenuhi salah satu kondisi dari 34 kondisi kritis, dan uang pertanggungan akan dibayarkan dengan menguragi uang pertangungan dasar.'
        	],
			[
        		'title' => 'PRUcrisis cover benefit plus 61',
        		'keterangan' => 'Memberikan manfaat Uang Pertanggungan apabila Tertanggung menderita salah satu dari 60 penyakit kritis tingkat akhir & penatalaksanaan invasif lainnya untuk Penyakit Pembuluh Darah Jantung yang saat dibayarkan tidak akan mengurangi Uang Pertanggungan Asuransi Dasar.'
        	],
			[
        		'title' => 'PRUcrisis cover benefit plus syatriah 61',
        		'keterangan' => 'Memberikan manfaat Santunan Asuransi apabila Peserta Yang Diasuransikan menderita salah satu dari 60 penyakit kritis tingkat akhir (memenuhi kriteria tabel pertanggungan kondisi kritis pada Polis) dan Angioplasty & penatalaksanaan invasif lainnya untuk Penyakit Pembuluh Darah Jantung yang saat dibayarkan tidak akan mengurangi Santunan Asuransi Dasar.'
        	],
			[
        		'title' => 'PRUcrisis cover syariah 34',
        		'keterangan' => 'Jika Anda didiagnosa menderita penyakit kritis maka uang pertanggungan akan dibayarkan yang akan mengurangi uang pertanggungan dasar.'
        	],
			[
        		'title' => 'PRUcrisis income',
        		'keterangan' => 'Memberikan pembayaran manfaat pendapatan sebesar Uang Pertanggungan PRUcrisis income sampai berakhirnya masa pertanggungan yang dipilih apabila Tertanggung Utama menderita* salah satu dari 33 kondisi kritis.'
        	],
			[
        		'title' => 'PRUcrisis income syariah',
        		'keterangan' => 'Memberikan pembayaran manfaat pendapatan sebesar Uang Pertanggungan PRUcrisis income sampai berakhirnya masa pertanggungan yang dipilih apabila Tertanggung Utama menderita* salah satu dari 33 kondisi kritis.'
        	],
			[
        		'title' => 'PRUearly stage crisis cover',
        		'keterangan' => 'Memberikn maanfaat kepada tertanggung utama yang mengalami kondisi kritis, baik yang memiliki stadium awal, menengah, maupun lanjut.'
        	],
			[
        		'title' => 'PRUearly stage crisis cover plus',
        		'keterangan' => 'Memberikan perlindungan finansial atas 119 penyakit kritis dan kondisi kritis untuk memastikan Anda terlindungi secara menyeluruh. Anda dapat melakukan klaim di stadium awal (early stage) tanpa harus menunggu penyakit kritis tersebut berkembang ke dalam stadium lebih lanjut'
        	],
			[
        		'title' => 'PRUearly stage crisis cover plus syariah',
        		'keterangan' => 'Memberikan manfaat tambahan apabila Peserta Utama menderita* salah satu dari 112 kondisi kritis yang terbagi dalam 3 tahap (awal, menengah, dan lanjut) dan memastikan Anda terlindungi secara menyeluruh.'
        	],
			[
        		'title' => 'PRUearly stage parent payor',
        		'keterangan' => 'Apabila Ayah atau Ibu Tertanggung Utama memenuhi kriteria salah satu dari Kondisi Kritis baik stadium awal , stadium menengah ataupun stadium akhir, setelah PRUearly stage parent payor berlaku selama 90 hari atau lebih/Cacat Total dan Tetap, sebelum usia Ayah dan/ atau Ibu dari Tertanggung Utama 70 tahun/meninggal dunia, Penanggung akan membayarkan Premi Berkala & Premi Top-up Berkala (PRUsaver) jika ada selama periode tertentu. '
        	],
			[
        		'title' => 'PRUearly stage parent payor syariah',
        		'keterangan' => 'Prudential akan meneruskan Pembayaran Kontribusi Berkala dan Kontribusi Top-up Berkala (jika ada) apabila Peserta Tambahan Yang Diasuransikan (ayah dan/atau ibu dari Peserta Utama Yang Diasuransikan) menderita salah satu dari 112 kondisi kritis (memenuhi kriteria tabel pertanggungan kondisi kritis pada Polis) yang terbagi dalam 3 stadium (awal,menengah dan akhir), atau mengalami Cacat Total dan Tetap sebelum berusia 70 tahun, atau meninggal dunia, selama periode tertentu untuk masa pertanggungan yang dipilih. Klaim dapat dilakukan tanpa harus menunggu kondisi tersebut berkembang mencapai stadium lebih lanjut.'
        	],
			[
        		'title' => 'PRUearly stage payor',
        		'keterangan' => 'Apabila Tertanggung Utama memenuhi kriteria salah satu dari Kondisi Kritis baik stadium awal (38 jenis kondisi), stadium menengah (26 jenis kondisi) ataupun stadium akhir (48 jenis kondisi), setelah PRUearly stage payor berlaku selama 90 hari atau lebih, Penanggung akan membayarkan Premi Berkala & Premi Top-up Berkala (PRUsaver) jika ada selama periode tertentu untuk masa pertanggungan yang dipilih.'
        	],
			[
        		'title' => 'PRUearly stage payor syariah',
        		'keterangan' => 'Apabila Tertanggung Utama memenuhi kriteria salah satu dari Kondisi Kritis baik stadium awal (38 jenis kondisi), stadium menengah (26 jenis kondisi) ataupun stadium akhir (48 jenis kondisi), setelah PRUearly stage payor berlaku selama 90 hari atau lebih, Penanggung akan membayarkan Premi Berkala & Premi Top-up Berkala (PRUsaver) jika ada selama periode tertentu untuk masa pertanggungan yang dipilih.'
        	],
			[
        		'title' => 'PRUearly stage spouse payor',
        		'keterangan' => 'Apabila Suami/Istri Tertanggung Utama memenuhi kriteria salah satu dari Kondisi Kritis baik stadium awal (38 jenis kondisi), stadium menengah (26 jenis kondisi) ataupun stadium akhir (48 jenis kondisi), setelah PRUearly stage spouse payor berlaku selama 90 hari atau lebih/Cacat Total dan Tetap, sebelum usia Suami/Istri dari Tertanggung Utama 70 tahun/meninggal dunia, Penanggung akan membayarkan Premi Berkala & Premi Top-up Berkala (PRUsaver) jika ada selama periode tertentu. '
        	],
			[
        		'title' => 'PRUearly stage spouse payor syariah',
        		'keterangan' => 'Prudential akan meneruskan Pembayaran Kontribusi Berkala dan Kontribusi Top-up Berkala (jika ada) apabila Peserta Tambahan Yang Diasuransikan (suami/istri dari Peserta Yang Diasuransikan) menderita salah satu dari 112 kondisi kritis (memenuhi kriteria tabel pertanggungan kondisi kritis pada Polis) yang terbagi dalam 3 stadium (awal,menengah dan akhir), atau mengalami Cacat Total dan Tetap sebelum berusia 70 tahun, atau meninggal dunia, selama periode tertentu untuk masa pertanggungan yang dipilih.'
        	],
			[
        		'title' => 'PRUhospital & surgical cover plus',
        		'keterangan' => 'Memberikan manfaat kepada Anda apabila memerlukan rawat inap, ICU dan tindakan pembedahan.Memberikan penggantian atas setiap tindakan bedah. '
        	],
			[
        		'title' => 'PRUhospital & surgical cover plus syariah',
        		'keterangan' => 'Memberikan manfaat kepada Anda apabila memerlukan rawat inap, ICU dan tindakan pembedahan.Memberikan penggantian atas setiap tindakan bedah Masing masing tindakan bedah'
        	],
			[
        		'title' => 'PRUjuvenile crisis cover',
        		'keterangan' => 'Perlindungan terhadap 32 jenis penyakit kritis seperti kanker, kawasaki, penyakit tangan-kaki-mulut dengan komplikasi berat, dan lain-lain. 100% Uang Pertanggungan yang dibayarkan tidakakan mengurangi Uang Pertanggungan produk asuransi dasar. '
        	],
			[
        		'title' => 'PRUjuvenile crisis cover syariah',
        		'keterangan' => 'Perlindungan terhadap 32 jenis penyakit kritis seperti kanker, kawasaki, penyakit tangan-kaki-mulut dengan komplikasi berat, dan lain-lain.100% Uang Pertanggungan yang dibayarkan tidakakan mengurangi Uang Pertanggungan produk asuransi dasar. '
        	],
			[
        		'title' => 'PRUlink term',
        		'keterangan' => 'Manfaat tambahan yang diberikan jika Tertanggung Utama meninggal dunia sebelum berakhirnya masa asuransi'
        	],
			[
        		'title' => 'PRUlink term syariah',
        		'keterangan' => 'Manfaat tambahan yang diberikan jika Tertanggung Utama meninggal dunia sebelum berakhirnya masa asuransi.'
        	],
			[
        		'title' => 'PRUmed cover',
        		'keterangan' => 'Memberikan tunjangan harian apabila Anda memerlukan perawatan inap di Rumah Sakit, ICU dan pembedahan.'
        	],
			[
        		'title' => 'PRUmed cover syariah',
        		'keterangan' => 'Memberikan tunjangan harian apabila Anda memerlukan perawatan inap di Rumah Sakit, ICU dan pembedahan.'
        	],
			[
        		'title' => 'PRUmultiple crisis cover',
        		'keterangan' => 'Jika Anda didiagnosa menderita salah satu dari 34 kondisi kritis maka uang pertanggungan PRUmultiple crisis cover akan dibayarkan dan tidak akan mengurangi uang pertanggungan dasar,dan Dapat mengajukan klaim kondisi kritis lebih dari satu kali dengan maksimal 3 kali untuk 3 kondisi kritis yang berbeda. '
        	],
			[
        		'title' => 'PRUmultiple crisis cover syariah',
        		'keterangan' => 'Jika Anda didiagnosa menderita salah satu dari 34 kondisi kritis maka uang pertanggungan PRUmultiple crisis cover akan dibayarkan dan tidak akan mengurangi uang pertanggungan dasar,dan Dapat mengajukan klaim kondisi kritis lebih dari satu kali dengan maksimal 3 kali untuk 3 kondisi kritis yang berbeda'
        	],
			[
        		'title' => 'PRUparent payor 33',
        		'keterangan' => 'Memberikan manfaat pembebasan pembayaran premi apabila Ayah dan/ Ibu Anda didiagnosa salah satu dari 33 kondisi kritis, mengalami cacat total dan tetap atau meninggal dunia.'
        	],
			[
        		'title' => 'PRUparent payor syariah 33',
        		'keterangan' => 'Memberikan manfaat pembebasan pembayaran premi apabila Ayah dan/ Ibu Anda didiagnosa salah satu dari 33 kondisi kritis, mengalami cacat total dan tetap atau meninggal dunia.'
        	],
			[
        		'title' => 'PRUpayor 33',
        		'keterangan' => 'Jika Anda menderita kondisi kritis, maka kami akan membayari Premi Berkala dan Top-up Premi Berkala (PRUsaver).dan Selama kami membayari Premi Berkala dan Top-up Premi Berkala (PRUsaver), Anda dibebaskan dari kewajiban tersebut'
        	],
			[
        		'title' => 'PRUpayor syariah 33',
        		'keterangan' => 'Jika Tertanggung Utama menderita* salah satu dari 33 kondisi kritis, PT Prudential Life Assurance akan melanjutkan pembayaran seluruh premi sampai berakhirnya masa pertanggungan yang dipilih. '
        	],
			[
        		'title' => 'PRUpersonal accident death',
        		'keterangan' => 'Memberikan manfaat tambahan apabila Tertanggung Utama meninggal dunia akibat kecelakaan.'
        	],
			[
        		'title' => 'PRUpersonal accident death plus',
        		'keterangan' => 'Memberikan manfaat tambahan apabila Tertanggung Utama meninggal dunia akibat kecelakaan, patah tulang kompleks karena kecelakaan, luka bakar karena kecelakaan, dan penggantian biaya rawat jalan darurat karena kecelakaan.'
        	],
			[
        		'title' => 'PRUpersonal accident death & disablement',
        		'keterangan' => 'Memberikan manfaat tambahan apabila Tertanggung Utama mengalami cacat total dan tetap atau meninggal dunia akibat kecelakaan.Selain memberikan santunan meninggal dunia karena kecelakaan juga memberikan pembayaran dari persentase uang pertanggungan apabila mengalami kehilangan fungsi anggota tubuh secara total, tetap dan tidak dapat dipulihkan sebagai akibat dari kecelakaan.'
        	],
			[
        		'title' => 'PRUpersonal accident death & disablement syariah',
        		'keterangan' => 'Memberikan manfaat tambahan apabila Tertanggung Utama mengalami cacat total dan tetap atau meninggal dunia akibat kecelakaan.Selain memberikan santunan meninggal dunia karena kecelakaan juga memberikan pembayaran dari persentase uang pertanggungan apabila mengalami kehilangan fungsi anggota tubuh secara total, tetap dan tidak dapat dipulihkan sebagai akibat dari kecelakaan.'
        	],
			[
        		'title' => 'PRUpersonal accident death and disablement plus',
        		'keterangan' => 'Memberikan manfaat tambahan apabila Tertanggung Utama meninggal dunia akibat kecelakaan, cacat total dan tetap karena kecelakaan, patah tulang kompleks karena kecelakaan, luka bakar karena kecelakaan, dan penggantian biaya rawat jalan darurat karena kecelakaan.'
        	],
			[
        		'title' => 'PRUpersonal accident death and disablement plus syariah',
        		'keterangan' => 'Memberikan manfaat tambahan apabila Tertanggung Utama mengalami cacat total dan tetap atau meninggal dunia akibat kecelakaan.'
        	],
			[
        		'title' => 'PRUpersonal accident death plus syariah',
        		'keterangan' => 'Memberikan manfaat tambahan sesuai dengan prinsip-prinsip syariah apabila Tertanggung Utama meninggal dunia akibat kecelakaan, patah tulang kompleks karena kecelakaan, luka bakar karena kecelakaan, dan penggantian biaya rawat jalan darurat karena kecelakaan.'
        	],
			[
        		'title' => 'PRUpersonal accident death syariah',
        		'keterangan' => 'Memberikan manfaat tambahan apabila Tertanggung Utama meninggal dunia akibat kecelakaan.'
        	],
			[
        		'title' => 'PRUspouse payor 33',
        		'keterangan' => 'Memberikan manfaat pembebasan seluruh pembayaran premi apabila Suami/Istri didiagnosa salah satu dari penyakit kritis.'
        	],
			[
        		'title' => 'PRUspouse payor syariah 33',
        		'keterangan' => 'Jika suami/istri dari Tertanggung Utama menderita salah satu dari 33 kondisi kritis atau mengalami cacat total dan tetap sebelum usia 70 tahun atau meninggal dunia, PT Prudential Life Assurance akan melanjutkan pembayaran seluruh premi sampai berakhirnya masa pertanggungan yang dipilih.'
        	],
			[
        		'title' => 'PRUspouse waiver 33',
        		'keterangan' => 'Memberikan manfaat pembebasan pembayaran premi sampai akhir masa pertanggungan apabila suami/istri Anda didiagnosa salah satu dari 33 kondisi kritis, mengalami cacat total dan tetap atau meninggal dunia.'
        	],
			[
        		'title' => 'PRUcrisis cover syariah 34',
        		'keterangan' => 'Memberikan manfaat pembebasan pembayaran premi sampai akhir masa pertanggungan apabila suami/istri Anda didiagnosa salah satu dari 33 kondisi kritis, mengalami cacat total dan tetap atau meninggal dunia.'
        	],
			[
        		'title' => 'PRUspouse waiver syariah 33',
        		'keterangan' => 'Memberikan manfaat pembebasan pembayaran premi dasar jika Anda didiagnosa salah satu dari 33 kondisi kritis.'
        	],
			[
        		'title' => 'PRUwaiver syariah 33',
        		'keterangan' => 'Jika Tertanggung Utama menderitasalah satu dari 33 kondisi kritis, PT Prudential Life Assurance akan melanjutkan pembayaran premi dasar sampai berakhirnya masa pertanggungan yang dipilih. '
        	],
        ];

        foreach ($data as $d) {
        	$p = new Produk;
        	$p->title = $d['title'];
        	$p->keterangan = $d['keterangan'];
        	$p->save();
        }
    }
}
