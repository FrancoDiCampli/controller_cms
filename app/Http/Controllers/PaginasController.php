<?php

namespace App\Http\Controllers;

use App\Pagina;

use App\Categoria;

use Illuminate\Http\Request;

class PaginasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginas = Pagina::get();

        return $paginas;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::get();
        return view('paginas.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ruta = public_path().'/img/galeria/';
        $temp_name = 'noimage.png';
          
            if($request->get('portada'))
            {
                $image = $request->get('portada');
                $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
                \Image::make($request->get('portada'))->save(public_path('img/galeria/').$name);
                $foto = '/img/galeria/'.$name;
            } else {
                $foto = '/img/galeria/default.png';
            }
        
        $atributos = request()->validate([
            'titulo' => 'required|min:1|max:90',
            'descripcion' => 'required|min:6|max:190',
            'categoria_id' => 'required',
        ]);

        $atributos['portada'] = $foto;

        $atributos['titulo'] = ucwords($atributos['titulo']);
        $atributos['descripcion'] = ucfirst($atributos['descripcion']);

        Pagina::create($atributos);

        return redirect('paginas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorias = Categoria::get();
        $pagina = Pagina::findOrFail($id);
        return view('paginas.edit',compact('pagina','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pagina = Pagina::findOrFail($id);

        $foto = '/img/galeria/default.jpg';
        
        $atributos = request()->validate([
            'titulo' => 'required|min:1|max:90',
            'descripcion' => 'required|min:6|max:190',
            'categoria_id' => 'required',
        ]);

        $atributos['portada'] = $foto;

        $atributos['titulo'] = ucwords($atributos['titulo']);
        $atributos['descripcion'] = ucfirst($atributos['descripcion']);

        $pagina->update($atributos);

        return redirect('paginas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pagina = Pagina::findOrFail($id);
        $pagina->delete();
    }
}
