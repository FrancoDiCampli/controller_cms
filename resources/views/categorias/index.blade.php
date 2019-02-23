@extends('welcome')

@section('contenido')

<div class="form-group">
    

    @foreach($categorias as $item)
        <a type="button" class="btn btn-primary" href="{{route('pagina',$item->id)}}">
        {{$item->categoria}} <span class="badge badge-light">{{count($item->paginas)}}</span>
            <span class="sr-only">sitios</span>
          </a>
    @endforeach
        
   
</div>
    

@endsection