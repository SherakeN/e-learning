<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laporan Data nilai</title>
	<style type="text/css" media="screen">
		
		body {
			font-family: Arial, Helvetica, sans-serif;
		}
		.title {
			
		}
		.title-logo {
			height: 80px;
			float: left;
		}
		.title-text {
			margin-left: 150px;
			line-height: 25px;
			font-size: 12pt;
			font-weight: bolder;
		}
		.title-date {
			text-align: right;
			font-size: 12pt;
		}
		.line {
			border-bottom: 1px solid #000;
			margin-top: 15px;
			margin-bottom: 15px;
		}
		.content {
			padding-top: 5px;
		}
		.content table {
			width: 100%;
			border: 1px solid #000;
			border-collapse: collapse;
		}
		th, td {
			border: 1px solid #000;
			padding: 5px;
			font-size: 7pt;
		}
		th {
			text-align: center;
		}
		.text-center {
			text-align: center;
		}
		.text-right {
			text-align: right;
		}
		.footer {
			padding-top: 20px;
			padding-left: 800px;
		}

	</style>
</head>
<body>
	<div class="title">
		<img src="{{ asset('img/pegadaian-logo.png') }}" class="title-logo">
		<div class="title-text">
			LAPORAN DATA NILAI PESERTA PENDIDIKAN DAN PELATIHAN <br> PT. PEGADAIAN (Persero) PADANG 
			<br> {{ $diklat->nama_diklat }}
		</div>
		<div class="title-date">Tanggal : {{ date('d M Y') }}</div>
	</div>
	<div class="line"></div>
	<div class="content">
		<p>Tabel Data Nilai :</p>
		<table >
			<thead>
				<tr>
					<th>No</th>
					<th>NIK</th>
					<th>Nama</th>
					<th>Asal</th>
					@foreach ($mataPelajaran as $pelajaran)
						<th>{{ $pelajaran->mata_pelajaran->slug }}</th>
					@endforeach
					<th>Rata</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($nilaiArray as $key => $element)
					<tr>
						<td>{{ $key+1 }}</td>
						<td>{{ $element['users_nik'] }}</td>
						<td>{{ $element['users_nama'] }}</td>
						<td>{{ $element['users_cabang'] }}</td>
						@foreach ($mataPelajaran as $pelajaran)
							<td class="text-center">{{ $element[$pelajaran->mata_pelajaran->slug] }}</td>
						@endforeach
						<td class="text-center">{{ $element['rata'] }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="footer text-center">
		<p>Padang, {{ date('d M Y') }} <br>Asmen Operasional Diklat</p>
		<br><br>
		<p><u>{{ Auth::user()->user_profil->nama }}</u> <br>NIK. {{ Auth::user()->user_profil->nik }}</p>
	</div>
</body>
</html>