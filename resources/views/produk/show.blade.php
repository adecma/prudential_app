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
		</div>

		<div class="panel-footer">
			<a href="{{ route('produk.index') }}" class="btn btn-default">Kembali</a>

			<a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-info">Edit</a>
		</div>
	</div>
@endsection