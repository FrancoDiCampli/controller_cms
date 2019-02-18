@extends('welcome')

@section('contenido')

<br><br>
<div class="container">
    <div class="row">
    	<div class="col s12">
    		<form action="{{route('paginas.update', $pagina->id)}}" method="POST" enctype="multipart/form-data">
    			@csrf
                @method('PUT')
    			<input type="text" name="titulo" value="{{$pagina->titulo}}" placeholder="titulo">
    			<textarea name="descripcion" value="{{$pagina->descripcion}}" placeholder="descripción"></textarea> 
    			<input type="file" name="portada" >
                <img src="{{$pagina->portada}}" alt="">
    			<select name="categoria_id" id="" >
                    <option value="{{$pagina->categoria_id}}" disable>{{$pagina->categoria_id}}</option>
					@foreach($categorias as $categoria)
					    <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
					@endforeach    				 
    			</select>
				
				<input type="submit" value="Actualizar">

    		</form>
    	</div>
    </div>
</div>

@endsection