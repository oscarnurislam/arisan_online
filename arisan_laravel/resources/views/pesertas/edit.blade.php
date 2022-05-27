@extends('template')

@section('content')

<div class="container ml-5">
	<form>
		<div class="form-group">
			<input type="text" class="form-control" value="{{ $peserta_fetch->nm_peserta }}" name="nm_peserta">
		</div>
		<div class="form-group">
			<input type="text" class="form-control" value="{{ $peserta_fetch->alamat }}" name="alamat">
		</div>
		<div class="form-group">
			<input type="text" class="form-control" value="{{ $peserta_fetch->no_tlp }}" name="no_tlp">
		</div>
	</form>
</div>


@endsection