<!DOCTYPE html>
<html>
<head>
    <title>ARISAN ONLINE</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/dist/css/bootstrap.css') }}">
    <link href="{{ asset('/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <style type="text/css">
        * {
          scroll-behavior: smooth;
        }
    </style>
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg shadow p-3 bottom-under ml-2 mr-2 mt-2 bg-light rounded navbar-light bg-light">
  <a class="navbar-brand" href="http://localhost:8000/login"><strong class="text-primary">ARISAN </strong><strong class="text-dark">ONLINE</strong></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse ml-2 mr-2" id="navbarNav">
    <ul class="nav navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link bottom-under" href="#about">Tentang</a>
      </li>
      <li class="nav-item">
        <a class="nav-link bottom-under" href="#section3">Kontak</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('auth.login') }}">Login</a>
      </li>
    </ul>
</div>
</nav>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{ asset('/img/arisan1.jpg') }}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('/img/arisan2.jpg') }}" alt="Second slide">
    </div>
    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<section class="mt-5">
  
</section>

<section class="section mt-3">
  <div class="container text-center" id="about">
    <h1 class="text-dark">Tentang Arisan</h1>

    <hr>
    <p><strong>Arisan adalah </strong>salah satu bagian dari kegiatan sekelompok masyarakat, khususnya kaum perempuan. Kegiatan arisan merupakan salah satu alternatif kegiatan untuk mengisi waktu luang dan bersenang-senang. Kegiatan arisan diadakan sesuai kesepakatan kelompok.  </p>
  </div>
</section>

 <section class="mt-5 ml-5" id="section3">
      <center><h1>  Kontak Saya  </h1></center>

      
      <div class="container">

        <div class="row">
          <center>
            
          </center>
          <div class="card ml-5 mt-5" style="width: 18rem;">
  <div class="card-body">
    <i class="fas fa-envelope fa-2x"></i>
    <p class="card-text">arisanonline.com</p>
  
     </div>
</div>

 <div class="card ml-5 mt-5" style="width: 18rem;">
 
  <div class="card-body">
  <i class="fab fa-whatsapp fa-2x"></i>
    <p class="card-text">0888-8888-8888</p>

   
    
  </div>
</div>


        </div>
        
      </div>
    </section>

    <section class="mt-5">
       <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <strong>Copyright &copy; <script>document.write(new Date().getFullYear());</script> ARISANONLINE.com
                    </div>
                </div>
            </footer>
    </section>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>