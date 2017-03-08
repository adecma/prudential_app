@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			Detail Produk {{ $produk->title }}
		</div>

		<div class="panel-body">
			<dl class="dl-horizontal">
				<dt>Produk</dt>
				<dd>{{ $produk->title }}</dd>
				<dt>Keterangan</dt>
				<dd>{{ $produk->keterangan }}</dd>

				@php
					$no = 0;
				@endphp

				@foreach($produk->ranges as $range)
					<dt>{{ $kriterias[$no++] }}</dt>
					<dd>{{ number_format($range->pivot->nilai) }}</dd>
				@endforeach
			</dl>

			@if($produk->kondisis->count())
				@php
					$n = 1;
				@endphp

				<hr>
				
				<h4>Pertanggungan Kondisi Kritis {{ $produk->kondisis->count() }}</h4>

				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Kondisi</th>
								<th>Stadium A</th>
								<th>Stadium B</th>
								<th>Stadium C</th>
							</tr>
						</thead>
						<tbody>
							@foreach($produk->kondisis as $kondisi)
								<tr>
									<td>{{ $n++ }}</td>
									<td>{{ $kondisi->title }}</td>
									<td>{{ $kondisi->stadium_a }}</td>
									<td>{{ $kondisi->stadium_b }}</td>
									<td>{{ $kondisi->stadium_c }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			@endif
		</div>
		
		@if(Auth::check())
			<div class="panel-footer">
				<a href="{{ route('produk.index') }}" class="btn btn-default">Kembali</a>

				<a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-info">Edit</a>
			</div>
		@endif
	</div>
@endsection