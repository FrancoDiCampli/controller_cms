@extends('welcome')

@section('contenido')

<br><br>
<div class="container">
    <div class="row">
    	<div class="col s12">
    		<form action="{{route('paginas.store')}}" method="POST" enctype="multipart/form-data">
    			@csrf
    			<input class="form-control" type="text" name="titulo" value="{{old('titulo')}}" placeholder="titulo">
    			<textarea class="form-control" name="descripcion" value="{{old('descripcion')}}" placeholder="descripción"></textarea> 
    			<input class="form-control" type="file" name="portada" >
				<input type="text" name="categoria_id" hidden value="{{$categoria}}">

				<input class="btn btn-success" type="submit" value="Enviar">

    		</form>
    	</div>
    </div>
</div>

@endsection