<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Parrafo extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['titulo', 'cuerpo', 'imagen', 'orden', 'pagina_id'];

    public function pagina()
    {
        return $this->belongsTo('App\Pagina');
    }
}
