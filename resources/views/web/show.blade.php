@extends('layouts.web')


@section('contenido')

<section class="page-section">
        <div class="container">
          <div class="product-item">
            <div class="product-item-title d-flex">
              <div class="bg-faded p-5 d-flex ml-auto rounded">
                <h2 class="section-heading mb-0">
                  <span class="section-heading-upper">{{$pagina->titulo}}</span>
                  <span class="section-heading-lower">{{$pagina->descripcion}}</span>
                </h2>
              </div>
            </div>
            <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="{{$pagina->portada}}" alt="">
            {{-- parrafos --}}
            @foreach($pagina->parrafos as $parrafo)
            <div class="product-item-description d-flex mr-auto">
              <div class="bg-faded p-5 rounded">
              <h2>{{$parrafo->titulo}}</h2>
              <img src="{{$parrafo->imagen}}" alt="" class="img-fluid col-6">
                <p class="mb-0" >
                    {{$parrafo->cuerpo}}
                </p>
              </div>
            </div>
            @endforeach
            {{-- end parrafos --}}
          </div>
        </div>
      </section>
@endsection