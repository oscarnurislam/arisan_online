<!DOCTYPE html>
<html>
<head>
  <title> Masuk </title>
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/login.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/dist/css/bootstrap.min.css') }}">
</head>
<body>
  <div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <a href="{{ route('auth.login') }}"><h2 class="active" > Masuk </h2></a>
    <a href="{{ route('auth.reg') }}"><h2 class="inactive underlineHover">Daftar</h2></a>

    <!-- Icon -->
    <div class="fadeIn first">
      <p><b class="lead text-primary">ARISAN ONLINE</b></p>
    </div>

    <!-- Login Form -->
    <form method="POST" action="{{ route('auth.check') }}">
      @csrf
      @if($message = Session::get('success'))
      <div class="alert ml-4 mr-4 alert-success alert-dismissible fade show" role="alert">
  <strong>Selamat!</strong> {{ $message }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
  @endif
      <input type="text" id="login" class="fadeIn second" name="email" placeholder="email"><br>
      <span class="text-danger">@error('name') {{ $message }}  @enderror</span>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password"><br>
      <span class="text-danger">@error('password') {{ $message }} @enderror</span>
      @if($message = Session::get('fail'))
      <div class="alert ml-4 mr-4 alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> {{ $message }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
  @endif
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>

<!-- <script type="text/javascript" src="{{ asset('dist/js/bootstrap.min.js')}}"></script> -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
