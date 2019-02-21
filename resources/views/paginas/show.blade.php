@extends('welcome')

@section('contenido')

<h1>Pagina: {{$pagina->titulo}}</h1>

<a href="{{route('parrafos.crear',$pagina->id)}}" class="btn btn-success">Nuevo</a>

    <table class="table">
        <thead>
            <tr>
                <th>Orden</th>  
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($secciones as $seccion)
                <tr>
                <td>{{$seccion->orden}}</td>
                <td>{{$seccion->titulo}}</td>
                <td>
                        <img src="{{$seccion->imagen}}" alt="" width="120px">
                </td>
                    <td>
                    <a class="btn btn-success" href="{{route('parrafos.edit',$seccion->id)}}">
                            Editar     
                        </a>
                        <form action="{{route('parrafos.destroy',$seccion->id)}}" method="POST" class="">
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                Eliminar
                                </button>
                        </form>

                       
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection