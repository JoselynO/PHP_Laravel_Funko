<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Funko extends Model{
    public static string $IMAGE_DEFAULT = 'https://m.media-amazon.com/images/I/917Mf8yTjEL._AC_UF894,1000_QL80_.jpg';
    protected $table = 'funkos';

    protected $fillable = [
        'nombre',
        'precio',
        'cantidad',
        'imagen',
        'categoria_id',
        'isDeleted',
    ];

    protected $hidden = [
        'isDeleted',
    ];


    public function scopeSearch($query, $search){
        return $query->whereRaw('LOWER(nombre) LIKE ?', ["%" . strtolower($search) . "%"])
            ->orWhereRaw('LOWER(nombre) LIKE ?', ["%" . strtolower($search) . "%"]);
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
}
