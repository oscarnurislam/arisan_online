@extends('template')

@section('content')

<div class="container ml-4">
	<div class="row">
		<h1>Data Peserta</h1>
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
	</div>
</div>

<section class="ml-4 mt-5 mr-4">
	<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Tambah Data Peserta
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Peserta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('peserta.store') }}" method="POST">
        	@csrf
        <div class="form-group">
        	<label>Nama Peserta : </label>
        	<input type="text" class="form-control" name="nm_peserta">
        </div>
         <div class="form-group">
         	<label>Alamat : </label>
        	<input type="text" class="form-control" name="alamat">
        </div>
         <div class="form-group">
         	<label>No. Telepon : </label>
        	<input type="text" class="form-control" name="no_tlp">
        	
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="table-responsive mt-2 mr-2">
	<table class="table mr-5">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">Alamat</th>
      <th scope="col">Nomor Telepon</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
  	@forelse($pesertas as $peserta)
    <tr>
      <th scope="row">{{ ++$i }}</th>
      <td>{{ $peserta->nm_peserta }}</td>
      <td>{{ $peserta->alamat }}</td>
      <td>{{ $peserta->no_tlp }}</td>
      <td> 
      	<form action="{{ route('peserta.destroy',$peserta->id) }}" method="POST">
      		@csrf
      		@method('DELETE')

         
      		<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
      	</form>
         <!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modaledit{{ $peserta->id }}">
  <i class="fa fa-book" aria-hidden="true"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="modaledit{{ $peserta->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('peserta.update', $peserta->id) }}" method="POST">

              @csrf
              @method('PUT')

              <input type="hidden" hidden value="{{ $peserta->id }}" name="id">
        <div class="form-group">
          <label>Nama Peserta : </label>
          <input type="text" class="form-control" value="{{ $peserta->nm_peserta }}" name="nm_peserta">
        </div>
         <div class="form-group">
          <label>Alamat : </label>
          <input type="text" class="form-control"value="{{ $peserta->alamat }}" name="alamat">
        </div>
         <div class="form-group">
          <label>No. Telepon : </label>
          <input type="text" class="form-control"value="{{ $peserta->no_tlp }}" name="no_tlp">
          
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
       </td>
    </tr>
    @empty
    <div class="alert alert-danger">
    	<p>Belum Ada Data</p>
    </div>
    @endforelse
  </tbody>
</table>

Halaman : {{ $pesertas->currentPage() }} <br/>
Jumlah Data : {{ $pesertas->total() }} <br/>
Data Per Halaman : {{ $pesertas->perPage() }} <br/>
{{ $pesertas->links() }}
</div>
</section>
@endsection

