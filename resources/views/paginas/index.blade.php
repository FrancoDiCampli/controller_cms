@extends('welcome')

@section('contenido')

<h1>Seccion: {{$categoria->categoria}}</h1>
<a href="{{route('paginas.create')}}" class="btn btn-success">Nuevo</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>  
                <th>Titulo</th>
                <th>Portada</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paginas as $pagina)
                <tr>
                <td>{{$pagina->id}}</td>
                <td>{{$pagina->titulo}}</td>
                <td>
                        <img src="{{$pagina->portada}}" alt="" width="120px">
                </td>
                    <td class="btn-group">
                        <a class="btn btn-success" href="{{route('paginas.show',$pagina->id)}}">
                            Secciones     
                        </a>
                        <a class="btn btn-primary" href="{{route('paginas.edit',$pagina->id)}}">
                            Editar     
                        </a>
                        <form action="{{route('paginas.destroy',$pagina->id)}}" method="POST" class="">
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