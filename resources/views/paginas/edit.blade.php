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
				<textarea name="descripcion" placeholder="descripción">
					{{$pagina->descripcion}}
				</textarea> 
    			<input type="file" name="portada" >
				<img src="{{$pagina->portada}}" alt="" >
				
				<input type="text" name="categoria_id" value="{{$categoria}}" hidden>
				
				<input type="submit" value="Actualizar">

    		</form>
    	</div>
    </div>
</div>

@endsection