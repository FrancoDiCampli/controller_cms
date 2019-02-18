@extends('welcome')

@section('contenido')

<br><br>
<div class="container">
    <div class="row">
    	<div class="col s12">
    		<form action="{{route('paginas.store')}}" method="POST" enctype="multipart/form-data">
    			@csrf
    			<input type="text" name="titulo" value="{{old('titulo')}}" placeholder="titulo">
    			<textarea name="descripcion" value="{{old('descripcion')}}" placeholder="descripción"></textarea> 
    			<input type="file" name="portada" >
    			<select name="categoria_id" id="" >
                    <option value="" disable>Categoria</option>
					@foreach($categorias as $categoria)
					    <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
					@endforeach    				 
    			</select>
				
				<input type="submit" value="Enviar">

    		</form>
    	</div>
    </div>
</div>

@endsection