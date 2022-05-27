@extends('template')

@section('content')
	<div class="container ml-5 mt-3">
		<h1 class="ml-2">Profile Admin</h1>
		<div class="row ml-3 mt-3">
			<table>
			<tr>
				<td>Nama Admin : </td>
				<td>{{ $LoggedUserInfo->name }}</td>
			</tr>
			<tr class="ml-2 mt-3">
				<td>Email Admin : </td>
				<td>{{ $LoggedUserInfo->email }}</td>
			</tr>
			<tr>
				<td>
					<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mt-5" data-toggle="modal" data-target="#editprofile{{ $LoggedUserInfo->id }}">
  <i class="fa fa-book"></i>
</button><br>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!!!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
<!-- Modal -->
<div class="modal fade" id="editprofile{{ $LoggedUserInfo->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Data {{ $LoggedUserInfo->name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="{{ route('profile.update', $LoggedUserInfo->id) }}" method="POST">
          @csrf
          @method('PUT')
      	
      	
        <div class="form-group">
        	<label> Nama :  </label>
        	<input type="text" class="form-control" value="{{ $LoggedUserInfo->name }}" name="name">
        </div>
        <div class="form-group">
        	<label> Email :  </label>
        	<input type="email" class="form-control" value="{{ $LoggedUserInfo->email }}" name="email">
        </div>
        <div class="form-group">
        	<label> Password :  </label>
        	<input type="password" class="form-control" name="password">
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Ubah</button>
      </div>
      </form>
    </div>
  </div>
</div>
				</td>
			</tr>
			</table>
			
			
		</div>
	</div>
@endsection