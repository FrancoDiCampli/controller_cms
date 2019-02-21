<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body>
            <nav class="nav">
                    <a class="nav-link active" href="#">Categorias</a>
                    <a class="nav-link"href="{{route('paginas.index')}}">Paginas</a>
                    <a class="nav-link" href="{{route('parrafos.index')}}">Secciones</a>
                    <a class="nav-link disabled" href="{{route('parrafos.create')}}" tabindex="-1" aria-disabled="true">Disabled</a>
                  </nav>

        <h2>Contenedor</h2>
        @if(count($errors))
            <div class="container">
           <div class="row">
               <div class="col-md-8 col-md-offset-2">
                   <div class="alert alert-danger">
                       <ul>
                           @foreach($errors->all() as $error)
                           <li>{{$error}}</li>
                           @endforeach
                       </ul>
                      
                   </div>
               </div>
           </div>
                </div>
        @endif
        <div class="container">
            @yield('contenido')

        </div>
    </body>
</html>
