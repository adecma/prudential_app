@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-body">
			<h3>Halaman Tentang</h3>
			<p class="text-justify">
				Asuransi merupakan suatu tunjangan bagi anda yang berkecukupan atau memerlukan kebutuhan dimasa akan datang, asuransi sendiri dibagi dalam berbagai macam, antara lain asuransi jiwa, asuransi kesehatan, dan asuransi laiannya. Adapun asuransi yang dibahas dalam aplikasi ini adalah Rider Asuran(Asuransi Tambahan), rider asuran biasanya memiliki jangka waktu yang disesuaikan dengan kemampuan ataupun dengan beban masalah yang dibebankan oleh keluarga pihak pemakai asuran secara signifikan. Berikut beberapa Produk Rider Asuran(Asuransi Tambahan) berserta keterangan setiap produknya.
			</p>

			@php
				$no = 1;
			@endphp

			<table class="table table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th width="20%">Produk</th>
						<th>Keterangan</th>
					</tr>
				</thead>

				<tbody>
					@foreach($produks as $produk)
						<tr>
							<td>{{ $no++ }}</td>
							<td>{{ $produk->title }}</td>
							<td>{{ $produk->keterangan }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>	
@endsection