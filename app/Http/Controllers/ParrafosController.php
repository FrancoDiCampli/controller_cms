<?php

namespace App\Http\Controllers;

use App\Pagina;

use App\Parrafo;
use Illuminate\Http\Request;

class ParrafosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parrafos = Parrafo::get();

        return $parrafos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paginas = Pagina::get();
        return view('parrafos.create',compact('paginas'));
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
          
            if($request->get('imagen'))
            {
                $image = $request->get('imagen');
                $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
                \Image::make($request->get('imagen'))->save(public_path('img/galeria/').$name);
                $foto = '/img/galeria/'.$name;
            } else {
                $foto = '/img/galeria/default.png';
            }
        
        $atributos = request()->validate([
            'titulo' => 'required|min:1|max:90',
            'cuerpo' => 'required|min:6|max:190',
            'orden' => 'required',
            'pagina_id' => 'required'
        ]);

        $atributos['imagen'] = $foto;

        $atributos['titulo'] = ucwords($atributos['titulo']);
        $atributos['cuerpo'] = ucfirst($atributos['cuerpo']);

        Parrafo::create($atributos);

        return redirect('parrafos');
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
        $paginas = Pagina::get();
        $parrafo = Parrafo::findOrFail($id);
        return view('parrafos.edit',compact('paginas','parrafo'));
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
        $parrafo = Parrafo::findOrFail($id);
        
        $foto = '/img/galeria/default.jpg';
        
        $atributos = request()->validate([
            'titulo' => 'required|min:1|max:90',
            'cuerpo' => 'required|min:6|max:190',
            'orden' => 'required',
            'pagina_id' => 'required'
        ]);

        $atributos['imagen'] = $foto;

        $atributos['titulo'] = ucwords($atributos['titulo']);
        $atributos['cuerpo'] = ucfirst($atributos['cuerpo']);

        $parrafo->update($atributos);

        return redirect('parrafos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parrafo = Parrafo::findOrFail($id);
        $parrafo->delete();
    }
}
