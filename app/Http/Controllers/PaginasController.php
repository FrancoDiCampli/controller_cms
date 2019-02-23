<?php

namespace App\Http\Controllers;

use App\Pagina;

use App\Categoria;

use Illuminate\Http\Request;
use App\Parrafo;
use Image;
class PaginasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = 1;
        $categoria = Categoria::find($id);
        $paginas = Pagina::where('categoria_id',$id)->paginate(10);

        return view('paginas.index',compact('paginas','categoria'));
    }

    public function indice($id){
       
        $categoria = Categoria::find($id);
        $paginas = Pagina::where('categoria_id',$id)->paginate(10);
        return view('paginas.index',compact('paginas','categoria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = 1;
        return view('paginas.create',compact('categoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request){

        
        $ruta = public_path().'/img/galeria/';
        $temp_name = 'noimage.png';
          
            if($request->hasFile('portada'))
            {   
                
                $imagenOriginal = request()->file('portada');
                          
                $imagen = Image::make($imagenOriginal);         
                $temp_name = $this->random_string() . '.' . $imagenOriginal->getClientOriginalExtension();
                 
                $imagen->save($ruta . $temp_name, 70);
                $foto = '/img/galeria/'.$temp_name;
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
        $pagina = Pagina::find($id);
        $secciones = Parrafo::orderBy('orden')->where('pagina_id',$id)->get();
        return view('paginas.show',compact('pagina','secciones'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $pagina = Pagina::findOrFail($id);
        $categoria = $pagina->categoria->id;
        return view('paginas.edit',compact('pagina','categoria'));
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

      
        $ruta = public_path().'/img/galeria/';

        $foto = $pagina->portada;

           if (request()->hasFile('portada')){
            $imagenOriginal = request()->file('portada');
                          
            $imagen = Image::make($imagenOriginal);         
            $temp_name = $this->random_string() . '.' . $imagenOriginal->getClientOriginalExtension();
             
            $imagen->save($ruta . $temp_name, 70);
            $foto = '/img/galeria/'.$temp_name;
            }
        
        
        $atributos = request()->validate([
            'titulo' => 'required|min:1|max:90',
            'descripcion' => 'required|min:6',
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
        return redirect('paginas');
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
