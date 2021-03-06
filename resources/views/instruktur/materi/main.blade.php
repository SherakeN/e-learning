@extends('template.default')

@section('title', 'Materi Pelajaran')

@section('content')

<div class="card">
	<div class="card-body">
		<p class="category">Kelola Materi Pelajaran</p><hr>
		<a href="{{ route('getAddMateriPage') }}" class="btn btn-green">TAMBAH MATERI PELAJARAN</a>
		<hr>
		<p><strong>Tabel Materi Pelajaran :</strong></p>
		<table id="tb-test" class="table table-bordered display responsive nowrap" width="100%" style="font-size: 12px;">
			<thead>
				<tr>
					<th>ID</th>
					<th>Judul Materi</th>
					<th>Mata Pelajaran</th>
					<th>Jenis File</th>
					<th>Keterangan</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
	</div>
</div>

@endsection

@push('style')

	<link rel="stylesheet" href="{{ asset('vendor/datatables/datatables.min.css') }}" />

@endpush


@push('script')
	
	<script src="{{ asset('vendor/datatables/datatables.min.js') }}" type="text/javascript"></script>
	<script>
		$(function(){
			$('#tb-test').DataTable({
				processing: true,
				serverSide: true,
				ajax: '{!! route('getDataMateri') !!}',
				columns: [
					{ data: 'id', name: 'id' },
					{ data: 'judul_materi', name: 'judul_materi' },
					{ data: 'mata_pelajaran_id', name: 'mata_pelajaran_id' },
					{ data: 'jenis_file', name: 'jenis_file' },
					{ data: 'keterangan', name: 'keterangan' },
					{ data: 'action', name: 'action' }
				],
				responsive: {
					details: {
						display: $.fn.dataTable.Responsive.display.modal( {
							header: function ( row ) {
								var data = row.data();
								return 'Detail Materi Pelajaran';
							}
						}),
						renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
							tableClass: 'table'
						})
					}
				}, 
				language: {
					url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Indonesian.json'
				}
			});
		});
	</script>

@endpush