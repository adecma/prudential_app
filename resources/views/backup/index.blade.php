@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			Backup
		</div>
		<div class="panel-body">
			<p class="text-justify">
				Backup database dengan klik tombol berikut <a href="{{ route('service.backup') }}" class="btn btn-xs btn-success">Backup</a>
			</p>
			@if(count($files))
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Daftar Backup</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($files as $file)
								@php
									$name = explode('/', $file)[1];
								@endphp

								<tr>
									<td>{{ $name }}</td>
									<td>
										<a href="{{ url('storage/' . $file) }}" class="btn btn-xs btn-success">Download</a>

										<button type="button" class="btn btn-danger btn-xs btn-delete" value="{{ $name }}">Hapus</button>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>

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
			@endif
		</div>
	</div>
@endsection

@push('js')
	<script>
		$(document).ready(function() {
			$('.btn-delete').click(function() {
				//build deleting url
				var url = '{{ route('service.backup') }}' + '/' + $(this).val();
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