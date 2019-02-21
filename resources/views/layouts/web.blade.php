<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Business Casual - Start Bootstrap Theme</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('css/app.css')}}" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('css/business-casual.css')}}" rel="stylesheet">

</head>

<body>
<div class="container" id="app">


  <h1 class="site-heading text-center text-white d-none d-lg-block">
    <span class="site-heading-upper text-primary mb-3">Centro de Estetica</span>
    <span class="site-heading-lower">La Casa del Ventilador</span>
  </h1>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Tratamientos
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
               
                @foreach($tratamientos as $tratamiento)
                <a class="dropdown-item" href="{{route('sitio.show',$tratamiento->id)}}">{{$tratamiento->titulo}}</a>
                @endforeach
               
              </div>
            </li>
            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Productos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        
                        @foreach($productos as $producto)
                        <a class="dropdown-item" href="{{route('sitio.show',$producto->id)}}">{{$producto->titulo}}</a>
                        @endforeach
                        
                    </div>
                </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Servicios
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    
                    @foreach($servicios as $servicio)
                    <a class="dropdown-item" href="{{route('sitio.show',$servicio->id)}}">{{$servicio->titulo}}</a>
                    @endforeach
                    
                </div>
            </li>

            <li class="nav-item">
              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
</nav>




  <section class="page-section clearfix">
    <div class="container">
            @yield('contenido')
    </div>
  </section>

  

  <footer class="footer text-faded text-center py-5">
    <div class="container">
      <p class="m-0 small">Copyright &copy; Your Website 2019</p>
    </div>
  </footer>

</div>
    <script src="{{asset('js/app.js')}}"></script>

</body>

</html>
