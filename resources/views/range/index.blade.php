@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			Range : {{ $ranges->total() }}
			<div class="pull-right">
				<a href="{{ route('range.create') }}" class="btn btn-primary btn-xs">Tambah</a>
				<a target="_blank" href="{{ route('range.cetak') }}" class="btn btn-warning btn-xs">Cetak</a>
			</div>
		</div>

		<div class="panel-body">
			@if(count($ranges) > 0)
				<div class="row">
					<div class="col-md-12">
						<form action="{{ route('range.index') }}" method="get" class="form-inline">
							<div class="input-group">
								<div class="input-group-addon">
									Filter :
								</div>
								<select name="q" class="form-control">									
									<option value="">---</option>

									@foreach($kriterias as $key => $value)
										@if($key == $q)
											<option value="{{ $key }}" selected>{{ $value }}</option>
										@else
											<option value="{{ $key }}">{{ $value }}</option>
										@endif
									@endforeach
								</select>
							</div>

							<div class="input-group">
								<div class="btn-group">
									<button class="btn btn-primary" type="submit">Process</button>
								</div>
							</div>
						</form>
					</div>
				</div>

				<table class="table table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Kriteria</th>
							<th>Atas</th>
							<th>Bawah</th>
							<th colspan="2">Bobot</th>
						</tr>
					</thead>

					<tbody>
						@foreach($ranges as $range)
							<tr>
								<td>{{ $no++ }}</td>
								<td>{{ $range->kriteria->title }}</td>
								<td>{{ number_format($range->atas) }}</td>
								<td>{{ number_format($range->bawah) }}</td>
								<td>{{ $range->bobot }}</td>
								<td>
									<a href="{{ route('range.edit', $range->id) }}" class="btn btn-info btn-xs">Edit</a>

									<button type="button" class="btn btn-danger btn-xs btn-delete" value="{{ $range->id }}">Hapus</button>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>

				{{ $ranges->appends(['q' => $q])->links() }}

				<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" >
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title">Konfirmasi</h4>
							</div>

							<form action="" method="post" id="form-delete">
								<div class="modal-body">
									<div class="form-group">
										<label>Yakin akan menghapus data ini?</label>
									</div>									
									{{ csrf_field() }}

									{{ method_field('delete') }}
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
									<button class="btn btn-danger" type="submit" id="btn-submit">Delete</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			@else
				<p class="text-center">
					Tidak ada data.
				</p>
			@endif
		</div>
	</div>
@endsection

@push('js')
	<script>
		$(document).ready(function() {
			$('.btn-delete').click(function() {
				//build deleting url
				var url = '{{ route('range.index') }}' + '/' + $(this).val();
				//set action form url
				$('#form-delete').attr('action', url);
				//show modal
				$('#modal-delete').modal();
				//hide modal after click submit button
				$('#btn-submit').click(function() {
					$('#modal-delete').modal('hide');
				});
			});			
		});
	</script>
@endpush