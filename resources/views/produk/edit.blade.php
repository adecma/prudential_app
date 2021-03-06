@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			Produk > Edit
		</div>

		<form action="{{ route('produk.update', $produk->id) }}" method="post">
			<div class="panel-body">
				{{ csrf_field() }}

				{{ method_field('put') }}

				<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
					<label>Produk</label>
					<input type="text" class="form-control" name="title" value="{{ old('title', $produk->title) }}">
				</div>

				@php
					$no = 0;
				@endphp

				@foreach($ranges as $range)
					@php
						$batas = explode(',', $range->batas);
			            // mengubah array $batas menjadi collection
			            $colBatas = collect($batas);
			            // mengambil data pertama
			            $first = $colBatas->first();
			            // mengambil data terakhir
			            $last = $colBatas->last();
					@endphp
					<div class="form-group {{ $errors->has('kriteria-' . $range->kriteria_id) ? 'has-error' : '' }}">
						<label>{{ title_case($range->kriteria->title) }}</label>
						<input type="number" class="form-control" name="kriteria-{{ $range->kriteria_id }}" value="{{ old('kriteria-' . $range->kriteria_id, $produk->ranges[$no++]->pivot->nilai) }}" placeholder="{{ number_format($first) }} - {{ number_format($last) }}">
					</div>
				@endforeach

				@if($errors->all())
					@include('layouts._formError')
				@endif
			</div>
			<div class="panel-footer">
				<a href="{{ route('produk.index') }}" class="btn btn-default">Kembali</a>

				<button type="submit" class="btn btn-success">Simpan</button>
			</div>
		</form>
	</div>
@endsection