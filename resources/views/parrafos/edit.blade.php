@extends('welcome')

@section('contenido')

<br><br>
<div class="container">
    <div class="row">
    	<div class="col s12">
    		<form action="{{route('parrafos.update',$parrafo->id)}}" method="POST" enctype="multipart/form-data">
    			@csrf
                @method('PUT')
    			<input type="text" name="titulo" value="{{$parrafo->titulo}}" placeholder="titulo">
    			<textarea name="cuerpo" value="{{$parrafo->cuerpo}}" placeholder="cuerpo"></textarea> 
    			<img src="{{$parrafo->imagen}}" alt="">
                <input type="file" name="imagen" >
                <select name="orden" id="">
                    <option value="{{$parrafo->orden}}">Orden {{$parrafo->orden}}</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
    			<select name="pagina_id" id="" >
                    <option value="{{$parrafo->pagina_id}}" disable>Pagina {{$parrafo->pagina_id}}</option>
					@foreach($paginas as $pagina)
					    <option value="{{$pagina->id}}">{{$pagina->id}}</option>
					@endforeach    				 
    			</select>
				
				<input type="submit" value="Enviar">

    		</form>
    	</div>
    </div>
</div>

@endsection