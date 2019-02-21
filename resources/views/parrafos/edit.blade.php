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
    			<textarea name="cuerpo"placeholder="cuerpo"> {{$parrafo->cuerpo}} </textarea> 
    			<img src="{{$parrafo->imagen}}" alt="">
                <input type="file" name="imagen" >
                <select name="orden" id="" class="form-control">

					@foreach ($resultado as $item)
					 @if($item == $parrafo->orden){
						<option value="{{$item}}" selected>{{$item}}</option>
					 }
					 @endif
					<option value="{{$item}}">{{$item}}</option>
 
					@endforeach
				   
				 </select>
				<input type="text" name="pagina_id" value="{{$parrafo->pagina_id}}" hidden>
				
    		
				<input type="submit" value="Enviar">

    		</form>
    	</div>
    </div>
</div>

@endsection