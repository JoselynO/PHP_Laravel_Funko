<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Exception;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function index(Request $request){
        $categorias = Categoria::buscar($request->buscar)->orderBy('id','asc')->paginate(4);
        return view('categorias.index')->with('categorias', $categorias);
    }

    public function create(){
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'min:2|max:120|required|unique:categorias,nombre',
        ]);

        try{
            $categoria = new Categoria();
            $categoria->nombre = strtoupper($request->nombre);
            $categoria->save();
            flash('Categoria ' . $categoria->nombre . ' creado con éxito.')->success()->important();
            return redirect()->route('categorias.index');
        } catch (Exception $e){
            flash('Ya existe una categoria con ese mismo nombre')->error()->important();
            return redirect()->back();
        }
    }

    public function edit($id){
        $categoria = Categoria::find($id);
        return view('categorias.edit')->with('categoria', $categoria);
    }


    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'min:2|max:120|required|unique:categorias,nombre,' . $id,
        ]);

        try{
            $categoria = Categoria::find($id);
            $categoria->nombre = strtoupper($request->nombre);
            $categoria->save();
            flash('Categoria ' . $categoria->nombre . ' actualizado con exito')->warning()->important();
            return redirect()->route('categorias.index');
        } catch (Exception $e){
            flash('Ya existe una categoria con este nombre')->error()->important();
            return redirect()->back();
        }
    }

    public function destroy($id){
        try {
            $categoria = Categoria::find($id);
            $funkosAsociados = $categoria->funkos()->count();
            if ($funkosAsociados > 0) {
                flash('No se puede eliminar la categoría porque tiene Funkos asociados.')->error()->important();
                return redirect()->route('categorias.index');
            }
            $categoria->delete();
            flash('Categoría eliminada con éxito.')->success()->important();
            return redirect()->route('categorias.index');
        } catch(Exception $e){
            flash('Error al eliminar la categoría: ' . $e->getMessage())->error()->important();
            return redirect()->back();
        }
    }


}
