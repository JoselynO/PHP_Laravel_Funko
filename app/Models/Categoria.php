<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';

    public static function getIdPorNombre($nombre){
        $categoria = self::where('nombre', $nombre)->first();
        return $categoria ? $categoria->id : null;
    }

    public static function getNombrePorId($id){
        $categoria = self::find($id);
        return $categoria ? $categoria->nombre : null;
    }

    public static function getNombres(){
        return self::pluck('nombre');
    }

    public function actualizarFunkosSinCategoria($id)
    {
        $funkos = Funko::where('categoria_id', $id)->get();

        if ($funkos->count() > 0) {
            foreach ($funkos as $funko) {
                $funko->categoria_id = 4;
                $funko->save();
            }
        }
    }

    public function scopeBuscar($query, $buscar){
        return $query->whereRaw('LOWER(nombre) LIKE ?', ["%" . strtolower($buscar) . "%"]);
    }

    public function funkos(){
        return $this->hasMany(Funko::class);
    }

}
