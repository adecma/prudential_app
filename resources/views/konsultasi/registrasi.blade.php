@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			Konsultasi > Registrasi
		</div>
		<form action="{{ route('konsultasi.store') }}" method="post">
			<div class="panel-body">
				{{ csrf_field() }}
				<div class="row">
					<div class="col-md-5">
						<label>Counter Pengunjung {{ $countRiwayat->id+1 }}</label>
					</div>
					<div class="col-md-7">
						<strong>Identitas User</strong>
					</div>
				</div>
				<div class="col-md-6">					
					<div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
						<label>Nama</label>
						<input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
					</div>

					<div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }}">
						<label>Alamat</label>
						<input type="text" class="form-control" name="alamat" value="{{ old('alamat') }}">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group {{ $errors->has('kontak') ? 'has-error' : '' }}">
						<label>No. HP</label>
						<input type="text" class="form-control" name="kontak" value="{{ old('kontak') }}">
					</div>

					<div class="form-group {{ $errors->has('rekomendasi') ? 'has-error' : '' }}">
						<label>Rekomendasi yang diinginkan</label>
						<input type="text" class="form-control" name="rekomendasi" value="{{ old('rekomendasi') }}" placeholder="3 - 10">
					</div>
				</div>

				<p class="text-center">
					<strong>Masukkan nilai kriteria</strong>
				</p>

				@foreach($ranges->chunk(3) as $chunk)
					<div class="row">
						@foreach($chunk as $range)
							@php
								$batas = explode(',', $range->batas);
					            // mengubah array $batas menjadi collection
					            $colBatas = collect($batas);
					            // mengambil data pertama
					            $first = $colBatas->first();
					            // mengambil data terakhir
					            $last = $colBatas->last();
							@endphp
							<div class="form-group col-md-4 {{ $errors->has('kriteria_' . $range->kriteria_id) ? 'has-error' : '' }}">
								<label>{{ title_case($range->kriteria->title) }}</label>
								<input type="number" class="form-control" name="kriteria_{{ $range->kriteria_id }}" value="{{ old('kriteria_' . $range->kriteria_id) }}" placeholder="{{ number_format($first) }} - {{ number_format($last) }}">
							</div>
						@endforeach
					</div>						
				@endforeach

				@if($errors->all())
					@include('layouts._formError')
				@endif
			</div>

			<div class="panel-footer">
				<button type="submit" class="btn btn-primary">Proses</button>
			</div>
		</form>
	</div>
@endsection