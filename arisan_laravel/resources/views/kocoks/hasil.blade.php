@extends('template')

@section('content')
<div class="container ml-4 text-center">
	<div class="row">
		<div class="col-md-11">
			<div class="jumbotron">
				@forelse($setorans as $setoran)
				<h1 class="text-primary">Selamat! Peserta Dengan Nama :  </h1>
				<h1>{{ $setoran->nm_peserta }}</h1>
				<h2 class="mt-2">Telah Mendapatkan Arisan Dengan Nominal : </h2>
				<h1 class="text-success"> @currency($count_saldo)</h1>
				<a href="{{ route('delete') }}" class="btn btn-success mt-3">Lanjut</a>
				@empty
				<div class="alert alert-danger">
					<h3>Belum Ada Peserta Yang Melakukan Setoran</h3>
				</div>
				@endforelse
			</div>
		</div>
	</div>
</div>


@endsection