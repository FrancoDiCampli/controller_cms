<?php

namespace App\Http\Controllers;

use App\Pagina;

use App\Parrafo;

use Illuminate\Http\Request;
use Image;
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

    public function crear($id){

        $orden = [];
        $sel = [];
        $pagina = Pagina::find($id);
        foreach ($pagina->parrafos as $value) {
            array_push($sel , $value->orden);
        }
        
        for ($i=1; $i <= 10; $i++) { 
            array_push($orden,$i);
        }

       $resultado = array_diff($orden, $sel);

        
        return view('parrafos.create',compact('pagina','resultado'));
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
          
            if($request->hasFile('imagen'))
            {   
                
                $imagenOriginal = request()->file('imagen');
                          
                $imagen = Image::make($imagenOriginal);         
                $temp_name = $this->random_string() . '.' . $imagenOriginal->getClientOriginalExtension();
                 
                $imagen->save($ruta . $temp_name, 70);
                $foto = '/img/galeria/'.$temp_name;
            } else {
                $foto = '/img/galeria/default.png';
            }
        
        $atributos = request()->validate([
            'titulo' => 'required|min:1|max:90',
            'cuerpo' => 'required|min:6',
            'orden' => 'required',
            'pagina_id' => 'required'
        ]);

        $atributos['imagen'] = $foto;

        $atributos['titulo'] = ucwords($atributos['titulo']);
        $atributos['cuerpo'] = ucfirst($atributos['cuerpo']);

        Parrafo::create($atributos);

        return redirect()->route('paginas.show',['id'=>$request->pagina_id]);
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
        $parrafo = Parrafo::find($id);

        $orden = [];
        $sel = [];
        $num = $parrafo->pagina->id;

     
       
        $pagina = Pagina::find($num);

        foreach ($pagina->parrafos as $value) {
            array_push($sel , $value->orden);
        }
        
        for ($i=1; $i <= 10; $i++) { 
            array_push($orden,$i);
        }

        $resultado = array_diff($orden, $sel);
        
        array_push($resultado,$parrafo->orden);
       
        return view('parrafos.edit',compact('parrafo','resultado'));
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
        
        $ruta = public_path().'/img/galeria/';

        $foto = $parrafo->imagen;

           if (request()->hasFile('imagen')){
            $imagenOriginal = request()->file('imagen');
                          
            $imagen = Image::make($imagenOriginal);         
            $temp_name = $this->random_string() . '.' . $imagenOriginal->getClientOriginalExtension();
             
            $imagen->save($ruta . $temp_name, 70);
            $foto = '/img/galeria/'.$temp_name;
            }
        
        
        $atributos = request()->validate([
            'titulo' => 'required|min:1|max:90',
            'cuerpo' => 'required|min:6',
            'orden' => 'required',
            'pagina_id' => 'required'
        ]);

        $atributos['imagen'] = $foto;

        $atributos['titulo'] = ucwords($atributos['titulo']);
        $atributos['cuerpo'] = ucfirst($atributos['cuerpo']);

        $parrafo->update($atributos);

        return redirect()->route('paginas.show',$atributos['pagina_id']);
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
        return redirect()->back();
    }

    protected function random_string()
    {
        $key = '';
        $keys = array_merge( range('a','z'), range(0,9) );
     
        for($i=0; $i<10; $i++)
        {
            $key .= $keys[array_rand($keys)];
        }
     
        return $key;
    }
}
