@extends('template')


@section('content')

<div class="container ml-4">
	<div class="row">
		<h1>Tambah Data Setoran</h1>
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

		

		@if($message = Session::get('fail'))
		<div class="alert ml-4 mr-4 alert-danger alert-dismissible fade show" role="alert">
  			<strong>Sukses!</strong> {{ $message }}
  			
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    				<span aria-hidden="true">&times;</span>
  				</button>
		</div>
		@endif
	</div>
</div>

<section class="ml-4 mt-5 mr-5">
	<form action="{{ route('setoran.store') }}" method="POST">
		@csrf

		<div class="form-group">
			<label> ID Peserta</label>
			<input type="text" class="form-control" name="id_peserta" id="id_peserta"><span class="input-group-btn">
        <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#modal">Cari ID Peserta</button>
        </span>
		</div>
		<div class="form-group">
			<label>Nama Peserta</label>
			<input type="text" class="form-control" name="nm_peserta" id="nm_peserta">
		</div>
		<div class="form-group">
			<label>Jumlah Setoran</label>
			<input type="text" class="form-control" name="jml_setoran">
		</div>
		<div class="form-group">
			<label>Tanggal Setoran</label>
			<input type="text" value="{{ date('Y-m-d') }}" readonly="" class="form-control" name="tgl_setoran">
		</div>
		
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Simpan</button>
			<a href="{{ route('setoran.index') }}" class="btn btn-secondary">Kembali</a>
		</div>
	</form>
</section>

<!-- Modal Section -->

<!-- modal -->
  <div id="modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form role="form" id="form-tambah" method="post" action="input.php">
        <div class="modal-header">
          <center>
          <h3 class="modal-title">Pilih Siswa</h3>
          </center>
        </div>
          <div class="modal-body">
            
            
            
            
              <table width="100%" class="table table-hover"  id="example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Peserta</th>
                                        <th>Nama Peserta</th>
                                        
                                        <!--<th>Jenis Kelamin</th>
                                        <th>Tempat</th>
                                        <th>Alamat</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                   @foreach($peserta_fetch as $peserta)
                  <tr id="pesertas" data-id_peserta=" {{ $peserta->id }}" data-nm_peserta="{{ $peserta->nm_peserta }}" >
                  	<td>
                  		{{ ++$i }}
                  	</td>
                    <td>
                      {{ $peserta->id }}
                    </td>
                    <td>
                      {{ $peserta->nm_peserta }}
                    </td>

                    
                  </tr>
                  @endforeach
                            </table>
            
            
          </div>  
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          </div>
      </div>
    </div>
  </div>
  

<!-- End Modal Section -->

@endsection