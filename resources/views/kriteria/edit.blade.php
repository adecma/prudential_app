@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			Kriteria > Edit
		</div>

		<form action="{{ route('kriteria.update', $kriteria->id) }}" method="post">
			<div class="panel-body">
				{{ csrf_field() }}

				{{ method_field('put') }}

				<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
					<label>Kriteria</label>
					<input type="text" class="form-control" name="title" value="{{ old('title', $kriteria->title) }}">
				</div>

				<div class="form-group {{ $errors->has('bobot') ? 'has-error' : '' }}">
					<label>Bobot</label>
					<input type="number" class="form-control" name="bobot" value="{{ old('bobot', $kriteria->bobot) }}">
				</div>

				<div class="form-group {{ $errors->has('atribut') ? 'has-error' : '' }}">
					<label>Atribut</label>
					<select name="atribut" class="form-control">
						@foreach($atributs as $data)
							@if(old('atribut', $kriteria->atribut) == $data)
								<option value="{{ $data }}" selected>{{ title_case($data) }}</option>
							@else
								<option value="{{ $data }}">{{ title_case($data) }}</option>
							@endif
						@endforeach
					</select>
				</div>

				@if($errors->all())
					@include('layouts._formError')
				@endif
			</div>
			<div class="panel-footer">
				<a href="{{ route('kriteria.index') }}" class="btn btn-default">Kembali</a>

				<button type="submit" class="btn btn-success">Simpan</button>
			</div>
		</form>
	</div>
@endsection