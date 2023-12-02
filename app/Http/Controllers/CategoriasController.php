<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Tarea;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias/index', ['categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener todas las tareas y categorias de la base de datos
        $tareas = Tarea::all();
        $categorias = Categoria::all();

        // Pasar las tareas a la vista
        return view('categorias/create', ['tareas' => $tareas, 'categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'titulo' => 'required|unique:categorias|min:3|max:255',
            'color' => 'required|max:7'
        ]);

        $categoria = new Categoria();
        $categoria->titulo = $request->titulo;
        $categoria->color = $request->color;
        $categoria->save();

        return redirect()->route('categorias.create')->with('success', '¡Categoría agregada!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categoria = Categoria::find($id);
        return view('categorias.show', ['categoria' => $categoria]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        request()->validate([
            'titulo' => 'required|min:3|max:255',
            'color' => 'required|max:7'
        ]);

        $categoria = Categoria::find($id);
        $categoria->titulo = $request->titulo;
        $categoria->color = $request->color;
        $categoria->save();

        return redirect()->route('categorias.index')->with('update_success', '¡Categoría actualizada!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        $categoria->tareas()->each(function ($tarea) {
            $tarea->delete();
        });
        $categoria->delete();

        return redirect()->route('categorias.index')->with('update_success', '¡Categoría eliminada!');
    }
}
