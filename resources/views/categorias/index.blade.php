@extends('welcome')

@section('contenido')

<div class="form-group">
    <ul>
        @foreach ($categorias as $item)
            <li><a href="{{route('pagina',$item->id)}}" class="btn btn-success">{{$item->categoria}}</a></li>
        @endforeach
    </ul>
        
   
</div>
    

@endsection