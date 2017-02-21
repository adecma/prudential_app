@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			Range > Tambah
		</div>

		<form action="{{ route('range.store') }}" method="post">
			<div class="panel-body">
				{{ csrf_field() }}

				<div class="form-group {{ $errors->has('kriteria') ? 'has-error' : '' }}">
					<label>Kriteria</label>
					<select name="kriteria" class="form-control">
						<option value="">---</option>
						
						@foreach($kriterias as $key => $value)
							@if(old('kriteria') == $key)
								<option value="{{ $key }}" selected>{{ title_case($value) }}</option>
							@else
								<option value="{{ $key }}">{{ title_case($value) }}</option>
							@endif
						@endforeach
					</select>
				</div>

				<div class="form-group {{ $errors->has('atas') ? 'has-error' : '' }}">
					<label>Atas</label>
					<input type="number" class="form-control" name="atas" value="{{ old('atas') }}">
				</div>

				<div class="form-group {{ $errors->has('bawah') ? 'has-error' : '' }}">
					<label>Bawah</label>
					<input type="number" class="form-control" name="bawah" value="{{ old('bawah') }}">
				</div>

				<div class="form-group {{ $errors->has('bobot') ? 'has-error' : '' }}">
					<label>Bobot</label>
					<input type="number" class="form-control" name="bobot" value="{{ old('bobot') }}">
				</div>				

				@if($errors->all())
					@include('layouts._formError')
				@endif
			</div>
			<div class="panel-footer">
				<a href="{{ route('range.index') }}" class="btn btn-default">Kembali</a>

				<button type="submit" class="btn btn-success">Simpan</button>
			</div>
		</form>
	</div>
@endsection