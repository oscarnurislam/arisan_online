@extends('template')

@section('content')

<div class="container ml-4">
	<div class="row">
		<h1 class="text-dark">Data Setoran</h1>
		@if($errors->any())
		<div class="alert ml-4 mr-4 alert-danger alert-dismissible fade show" role="alert">
  			<strong>Error!</strong> @foreach($errors->all() as $error)
  				<ul>
  					<li>{{ $error }}</li>
  				</ul>
  				@endforeach
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    				<span aria-hidden="true">&times;</span>
  				</button>
		</div>
		@endif

		@if($message = Session::get('success'))
		<div class="alert ml-4 mr-4 alert-success alert-dismissible fade show" role="alert">
  			<strong>Sukses!</strong> {{ $message }}
  				
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    				<span aria-hidden="true">&times;</span>
  				</button>
		</div>
		@endif

		@if($message = Session::get('fail'))
		<div class="alert ml-4 mr-4 alert-danger alert-dismissible fade show" role="alert">
  			<strong>Gagal!</strong> {{ $message }}
  			
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    				<span aria-hidden="true">&times;</span>
  				</button>
		</div>
		@endif
	</div>
</div>

<section class="ml-4 mt-5 mr-4">
	<a href="{{ route('setoran.create') }}" class="btn btn-primary mb-2">Tambah Data Setoran</a>
	<div class="table-responsive">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Peserta</th>
      <th scope="col">Jumlah Setoran</th>
      <th scope="col">Tanggal Setor</th>
      <th scope="col">Hapus</th>
    </tr>
  </thead>
  <tbody>
  	@forelse($setorans as $setoran)
    <tr>
      <th scope="row">{{ ++$i }}</th>
      <td>{{ $setoran->nm_peserta }}</td>
      <td>@currency($setoran->jml_setoran)</td>
      <td>{{ $setoran->tgl_setoran }}</td>
      <td>
        <form action="{{ route('setoran.destroy', $setoran->id) }}" method="POST">
          @csrf
          @method('DELETE')

          <button class="btn btn-danger" type="submit" onclick="return confirm('yakin ingin dihapus?')">Hapus</button>
        </form>
      </td>
      
     </tr>
     @empty
    <div class="alert alert-danger">
    	<p>Belum Ada Data</p>
    </div>
    @endforelse
   
  </tbody>
</table>
	</div>
</section>

@endsection