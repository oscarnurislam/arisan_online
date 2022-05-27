@extends('template')

@section('content')


<div class="container ml-4">
	<div class="row">
		 <h1>Data Status</h1>
	</div>
</div>


<section class="ml-4 mt-5 mr-5">
	<div class="table_responsive">
		<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">Alamat</th>
      <th scope="col">No. Telepon</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  	@forelse($statuss as $status)
    <tr>
      <th scope="row">{{ ++$i }}</th>
      <td>{{ $status->nm_peserta }}</td>
      <td>{{ $status->alamat }}</td>
      <td>{{ $status->no_tlp }}</td>
      <td>
      	@if($status->status == "belum lunas")
      	<a href="#" class="badge badge-danger">Belum Lunas</a>
      	@else
      	<a href="#" class="badge badge-success">Lunas</a>
      	@endif
      </td>
    </tr>

    @empty
    <div class="alert alert-danger">
    	<p>Belum ada data</p>
    </div>
    @endforelse
   
  </tbody>
</table>
	</div>
</section>

@endsection