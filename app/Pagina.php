<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Pagina extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['titulo', 'descripcion', 'portada', 'categoria_id'];

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }

    public function parrafos()
    {
        return $this->hasMany('App\Parrafo');
    }
}
