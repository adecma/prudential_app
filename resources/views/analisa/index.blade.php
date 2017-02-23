@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			Hasil Analisa - Produk : {{ $rankProduk->count() }}
			<div class="pull-right">
				<a target="_blank" href="{{ route('analisa.cetak') }}" class="btn btn-warning btn-xs">Cetak</a>
			</div>
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Rank</th>
						<th>Produk</th>
						<th>Nilai</th>
					</tr>
				</thead>
				<tbody>
					@foreach($rankProduk as $produk => $value)
						<tr>
							<td>{{ $produk+1 }}</td>
							<td>{{ $value['produk_title'] }}</td>
							<td>{{ $value['hasil'] }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection