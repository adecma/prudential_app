@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			Detail Riwayat
		</div>

		<div class="panel-body">
			<h4>Data User</h4>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Identitas</th>
							<th>Kriteria</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<dl class="dl-horizontal">
									<dt>Nama</dt>
									<dd>{{ $riwayat->nama }}</dd>
									<dt>Alamat</dt>
									<dd>{{ $riwayat->alamat }}</dd>
									<dt>Kontak</dt>
									<dd>{{ $riwayat->kontak }}</dd>
									<dt>Rekomendasi</dt>
									<dd>{{ $riwayat->limit }}</dd>
									<dt>Tanggal</dt>
									<dd>{{ $riwayat->created_at->format('d F Y, H:i:s') }}</dd>
								</dl>
							</td>

							<td>							
								<dl class="dl-horizontal">
									@php
										$kriteriaUser = json_decode($riwayat->kriteria);
									@endphp

									@foreach($kriteriaUser as $kriteria)
										<dt>{{ $kriteria->kriteria }}</dt>
										<dd>
											{{ number_format($kriteria->nilai) }}
										</dd>
									@endforeach
								</dl>								
							</td>
						</tr>
					</tbody>
				</table>
			</div>								

			<hr>									

			<h4>Rekomendasi</h4>

			@php
				$no = 1;
			@endphp

			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Rank</th>
							<th>Produk</th>
							<th>Nilai</th>
						</tr>
					</thead>

					<tbody>
						@foreach(json_decode($riwayat->hasil) as $data)				
							<tr>
								<td>{{ $no++ }}</td>
								<td>{{ $data->produk_title }}</td>
								<td>{{ $data->hasil }}</td>
							</tr>						
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

		<div class="panel-footer">
			<a href="{{ route('riwayat.index') }}" class="btn btn-default">Kembali</a>
			<a href="{{ route('konsultasi.cetak', $riwayat->id) }}" class="btn btn-warning" target="_blank">Cetak</a>
			<button type="button" class="btn btn-danger btn-delete" value="{{ $riwayat->id }}">Hapus</button>
		</div>
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
@endsection

@push('js')
	<script>
		$(document).ready(function() {
			$('.btn-delete').click(function() {
				//build deleting url
				var url = '{{ route('riwayat.index') }}' + '/' + $(this).val();
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