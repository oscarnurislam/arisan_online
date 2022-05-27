<!DOCTYPE html>
<html>
<head>
  <title> Daftar </title>
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/login.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/dist/css/bootstrap.min.css') }}">
</head>
<body>
  <div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <a href="{{ route('auth.login') }}"><h2 class="underlineHover inactive"> Masuk </h2></a>
    <a href="{{ route('auth.reg') }}"><h2 class="active">Daftar</h2></a>

    <!-- Icon -->
    <div class="fadeIn first">
      <p class="lead text-dark">ARISAN <b class="lead text-primary">ONLINE</b></p>
    </div>

    <!-- Login Form -->
    <form action="{{ route('auth.create') }}" method="POST">
      @csrf
      <input type="text" id="login" class="fadeIn second" name="name" value="{{ old('name') }}" placeholder="nama"><br>
      <span class="text-danger"> @error('name') {{ $message }} @enderror</span>
     
      <input type="text" id="login" value="{{ old('email') }}" class="fadeIn second" name="email" placeholder="email"><br>
      <span class="text-danger">@error('email') {{ $message }} @enderror</span>

      
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password"><br>
      <span class="text-danger">@error('password') {{ $message }} @enderror</span>

      
      <input type="submit" class="fadeIn fourth" value="REGISTER">
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
