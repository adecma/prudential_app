<?php

use Illuminate\Database\Seeder;
use App\Kondisi;
use App\Produk;

class KondisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sample = [
        	[
        		'title' => 'Anemia aplastik', 
        		'a' => 1, 
        		'b' => 0, 
        		'c' => 1,
        	],
			[
        		'title' => 'Anemia Aplastik Yang Tidak Dapat Dipulihkan', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Angioplasti dan penataaksanaan Invesif lainnya untuk penyakit Pembuluh darah jantung', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Angioplasty and Other Invasive Treatment for Coronary Artery (Angioplasti dan penatalaksanaan invasif pada pembuluh darah jantung)', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Cerebral Aneurysm Requiring Brain Surgery (Kelainan Pembuluh Darah Otak yang membutuhkan pembedahan otak)', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Chronic Adrenal Insufficiency (Insufisiensi Adrenal Akut) (Penyakit Addisions)', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Disabling primary pulmonary Hypertention', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Dissecting Aortic Aneurysm (pembedahan Aneurisma Aorta)', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Distropi Muskular', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Elephantiasis (Penyakit Kaki Gajah)', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Ensefalitis', 
        		'a'=> 1, 
        		'b'=> 1, 
        		'c'=> 1,
        	],
			[
        		'title' => 'Epatitis akibat pekeerjaan dan HIV karena tranfusi darah', 
        		'a'=> 1, 
        		'b'=> 0, 
        		'c'=> 1,
        	],
			[
        		'title' => 'Gagal Ginjal', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Hepatitis Autoimun Kronis (Pembedahan untuk Skoliosis Idiopatik)', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Hepatitis Virus Fulminan', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Hilangnya Kemampuan Hidup Mandiri', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Hilangnya Penglihatan Total', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Hipertensi dan kolangitis', 
        		'a'=> 1, 
        		'b'=> 1, 
        		'c'=> 1,
        	],
			[
        		'title' => 'Hipertensi pulmonal', 
        		'a'=> 1, 
        		'b'=> 1, 
        		'c'=> 1,
        	],
			[
        		'title' => 'HIV karena Transfusi Darah', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'HIV yang didapatkan dari tranfusi darah', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'HIV yang disebabkan oleh pekerjaan', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Infective Endocarditis (Endokarditis Infektif)', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Kanker', 
        		'a'=> 1, 
        		'b'=> 1, 
        		'c'=> 1,
        	],
			[
        		'title' => 'Kardiomiopati Parah', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Kehilangan Kemampuan Bicara', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Kehilangan Pendengaran secara Total', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Kelainan fungsi dan kelumpuhan', 
        		'a'=> 1, 
        		'b'=> 1, 
        		'c'=> 1,
        	],
			[
        		'title' => 'Kelainan jantung', 
        		'a'=> 1, 
        		'b'=> 1, 
        		'c'=> 1,
        	],
			[
        		'title' => 'Kelainan kemampuan bicara', 
        		'a'=> 1, 
        		'b'=> 0, 
        		'c'=> 1,
        	],
			[
        		'title' => 'Kelainan pada otak', 
        		'a'=> 1, 
        		'b'=> 0, 
        		'c'=> 1,
        	],
			[
        		'title' => 'Kelainan pada telinga dan trobosis sinus kavernosus', 
        		'a'=> 1, 
        		'b'=> 1, 
        		'c'=> 1,
        	],
			[
        		'title' => 'Kelainan pembuluh darah Aorta', 
        		'a'=> 1, 
        		'b'=> 0, 
        		'c'=> 1,
        	],
			[
        		'title' => 'Kelainana pembuluh darah otak stroke', 
        		'a'=> 1, 
        		'b'=> 1, 
        		'c'=> 1,
        	],
			[
        		'title' => 'Kelianan ginjal', 
        		'a'=> 1, 
        		'b'=> 0, 
        		'c'=> 1,
        	],
			[
        		'title' => 'Kelumpuhan', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Ketulian', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Kolitis ulseratif', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Koma', 
        		'a'=> 1, 
        		'b'=> 1, 
        		'c'=> 1,
        	],
			[
        		'title' => 'Luka bakar', 
        		'a'=> 1, 
        		'b'=> 0, 
        		'c'=> 1,
        	],
			[
        		'title' => 'Luka bakar kritis', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Lupus eritematosus sistemik', 
        		'a'=> 1, 
        		'b'=> 0, 
        		'c'=> 1,
        	],
			[
        		'title' => 'Meningeal Tuberculosis (Meningitis Tuberkulosa)', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Meningitis Bakteri Berat', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Meningitis bakterial', 
        		'a'=> 1, 
        		'b'=> 1, 
        		'c'=> 1,
        	],
			[
        		'title' => 'Motor Neuron Diseae', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Multiple Sclerosis', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Muscular dystrophy', 
        		'a'=> 1, 
        		'b'=> 0, 
        		'c'=> 1,
        	],
			[
        		'title' => 'Myasthenia Gravis (Penyakit Autoimun yang menyebabkan kelemahan pada otot)', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Necrotising Fasciitis (Jaringan tubuh yang mati disebabkan oleh Infeksi Bakteri)', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Neuropati perifer dan poliomyelitis', 
        		'a'=> 1, 
        		'b'=> 1, 
        		'c'=> 1,
        	],
			[
        		'title' => 'Pankreatitis (Pembengkakan Pankreas) Kambuhan Kronis', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Pembedahan kantub jantung', 
        		'a'=> 1, 
        		'b'=> 0, 
        		'c'=> 1,
        	],
			[
        		'title' => 'Pembedahan Katup Jantung secara Terbuka', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Pembedahan pada pembuluh darah koroner jantung', 
        		'a'=> 1, 
        		'b'=> 0, 
        		'c'=> 1,
        	],
			[
        		'title' => 'Pembedahan terbuka pada Pembuluh Darah Aorta', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Penyakit alzheimer', 
        		'a'=> 1, 
        		'b'=> 0, 
        		'c'=> 1,
        	],
			[
        		'title' => 'Penyakit crohn', 
        		'a'=> 1, 
        		'b'=> 0, 
        		'c'=> 1,
        	],
			[
        		'title' => 'Penyakit hati', 
        		'a'=> 1, 
        		'b'=> 1, 
        		'c'=> 1,
        	],
			[
        		'title' => 'Penyakit Hati Kronis', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Penyakit Kawasaki (Proteksi akan berhenti pada usia 18)', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Penyakit Kista Meduler', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Penyakit motor neuron', 
        		'a'=> 1, 
        		'b'=> 0, 
        		'c'=> 1,
        	],
			[
        		'title' => 'Penyakit pada syaraf belakang', 
        		'a'=> 1, 
        		'b'=> 0, 
        		'c'=> 1,
        	],
			[
        		'title' => 'Penyakit pada usus', 
        		'a'=> 1, 
        		'b'=> 1, 
        		'c'=> 1,
        	],
			[
        		'title' => 'Penyakit parkinson', 
        		'a'=> 1, 
        		'b'=> 0, 
        		'c'=> 1,
        	],
			[
        		'title' => 'Penyakit paru kronik', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Penyakit pembuluh darah jantung lain yang serius', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Penyakit serius lainnya pada pembuluh darah koroner jantung', 
        		'a'=> 1, 
        		'b'=> 0, 
        		'c'=> 1,
        	],
			[
        		'title' => 'Penyakit Tangan, Kaki, dan Mulut dengan Komplikasi Kronis (mengancam jiwa)', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Penyakit Wilson (Proteksi akan berhenti pada usia 18)', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Penyakt alzeimer', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Poliomyelitis', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Progressive Supranuclear Palsy', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Putusnya Akar-Akar Saraf Plexus Brakhialis', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Rheumatoid Arthritis Kronis', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Serangan jantung', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Severance of Limbs (Kehilangan Anggota Tubuh)', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Severe Creutzfeld-Jacob Disease (Gangguan Saraf Degenatif)', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Skeleroderma Progresif', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Sklerosis Multipel', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Stroke', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Stroke Requiring Carotid Endarterectomy Surgery (Stroke yang membutuhkan pembedahan Endarterektomi karotis)', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Surgery for Idiopathic Scoliosis', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Terminal Illness', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Tidakan bedah pembuluh darah Aorta', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Tindakan Bedah Bypass Pembuluh Darah Jantung (Coronary Artery Bypass Grafting)', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Tindakan bedah katup jantung', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Transplantasi organ', 
        		'a'=> 1, 
        		'b'=> 0, 
        		'c'=> 1,
        	],
			[
        		'title' => 'Transplantasi Organ Penting', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Trauma berat kepala', 
        		'a'=> 1, 
        		'b'=> 0, 
        		'c'=> 1,
        	],
			[
        		'title' => 'Trauma kepala serius', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Tumor Jinak di Otak', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
			[
        		'title' => 'Ulcerative colitis', 
        		'a'=> 1, 
        		'b'=> 0, 
        		'c'=> 1,
        	],
			[
        		'title' => 'Ulcerative colitis Berat', 
        		'a'=> 0, 
        		'b'=> 0, 
        		'c'=> 0,
        	],
        ];

        foreach ($sample as $data) {
        	$a = new Kondisi;
        	$a->title = $data['title'];
        	$a->stadium_a = $data['a'];
        	$a->stadium_b = $data['b'];
        	$a->stadium_c = $data['c'];
        	$a->save();
        }

        $produk33 = Produk::whereIn('id', [40,42,43,26,27,28,29,38,39])->get();
        $sample33 = [1,11,12,18,19,24,28,29,30,31,32,33,34,35,39,40,42,44,48,51,53,55,57,58,59,63,64,65,66,69,89,91,94];
        foreach ($produk33 as $p) {
        	$p->kondisis()->attach($sample33);
        }

        $produk34 = Produk::whereIn('id', [41,1,4])->get();
        $sample34 = [1,11,24,39,42,58,66,3,7,9,13,15,21,26,36,37,38,41,45,46,47,60,67,68,72,73,77,82,86,87,88,90,92,93];
        foreach ($produk34 as $p) {
        	$p->kondisis()->attach($sample34);
        }

        $produk61 = Produk::whereIn('id', [2,3])->get();
        $sample61 = [11,24,39,42,58,66,7,13,15,26,36,60,67,73,77,82,87,90,93,40,44,48,57,63,69,91,2,4,5,6,8,10,14,16,17,20,22,23,25,27,43,49,50,52,4,56,61,62,70,71,74,75,76,8,79,80,81,83,84,85,95];
        foreach ($produk61 as $p) {
        	$p->kondisis()->attach($sample61);
        }
    }
}
