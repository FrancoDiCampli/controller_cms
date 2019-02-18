@extends('welcome')

@section('contenido')

<br><br>
<div class="container">
    <div class="row">
    	<div class="col s12">
    		<form action="{{route('parrafos.store')}}" method="POST" enctype="multipart/form-data">
    			@csrf
    			<input type="text" name="titulo" value="{{old('titulo')}}" placeholder="titulo">
    			<textarea name="cuerpo" value="{{old('cuerpo')}}" placeholder="cuerpo"></textarea> 
    			<input type="file" name="imagen" >
                <select name="orden" id="">
                    <option value="">Orden</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
    			<select name="pagina_id" id="" >
                    <option value="" disable>Pagina</option>
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