@extends('template.default')

@section('title', 'Blok User Akun')

@section('content')

<div class="card">
	<div class="card-body">
		<p class="category">Blok User Akun</p><hr>
		<p>Apakah anda yakin ingin memblok user akun berikut ini?</p>
		<p>NIK : <strong>{{ $user->nik }}</strong></p>
		<p>Nama : <strong>{{ $user->nama }}</strong></p>
		<div class="row">
			<div class="col-md-9 offset-md-3">
				@include('template.partials.formerror')
				<form action="" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="id" value="{{ $user->id }}">
					<div class="form-group row">
						<div class="col-sm-12">
							<button type="submit" class="btn btn-green">Blok User Akun</button>
							<a href="{{ route('getUserAkunPage') }}" class="btn btn-default">Batal</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection