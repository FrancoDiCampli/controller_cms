@extends('welcome')

@section('contenido')

<br><br>
<div class="container">
    <div class="row">
    	<div class="col">
			<form 
				action="{{route('parrafos.store')}}" 
				method="POST" 
				enctype="multipart/form-data"
				class="form-group">
    			@csrf
				<input 
				class="form-control"
					type="text" name="titulo" 
					value="{{old('titulo')}}" 
					placeholder="titulo">
				
				<textarea class="form-control" name="cuerpo" 
					value="{{old('cuerpo')}}" 
					placeholder="cuerpo"></textarea> 

				<input type="file" name="imagen" >
				<label for="">Orden</label>
                <select name="orden" id="" class="form-control">

                   @foreach ($resultado as $item)
				<option value="{{$item}}">{{$item}}</option>

				   @endforeach
                  
                </select>
			<input type="text" value="{{$pagina->id}}" hidden name="pagina_id">
				<input type="submit" value="Guardar" class="btn btn-primary">

    		</form>
    	</div>
    </div>
</div>

@endsection