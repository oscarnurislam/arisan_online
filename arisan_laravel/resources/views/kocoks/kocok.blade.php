@extends('template')

@section('content')
<div class="container ml-4 text-center">
	<div class="row">
		<div class="col-md-11">
			<div class="jumbotron">
				<h1>Klik tombol dibawah untuk mendapatkan hasil</h1>
				<a href="{{ route('hasil') }}" class="btn btn-primary mt-2">hasil</a>
			</div>
		</div>
	</div>
</div>


@endsection