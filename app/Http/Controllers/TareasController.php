<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use App\Models\Categoria;

class TareasController extends Controller
{
    /*
    *   - Index para mostrar todas las tareas
    *   - Show para mostrar una tarea
    *   - Store para guardar una tarea
    *   - Update para actualizar una tarea
    *   - Delete para eliminar una tarea
    *   - Edit para mostrar el formulario de edición de una tarea
    */

    public function store(Request $request)
    {
        // Validar los datos
        request()->validate([
            'titulo' => 'required|unique:tareas|min:3|max:255',
        ]);

        // Crear una nueva tarea
        $tarea = new Tarea();

        // Asignar los valores
        $tarea->titulo = $request->titulo;
        $tarea->descripcion = $request->descripcion;
        $tarea->categoria_id = $request->categoria_id;

        // Guardar en la base de datos
        $tarea->save();

        // Redireccionar
        return redirect('/tareas')->with('success', '¡Tarea agregada!');
    }

    public function index()
    {
        // Obtener todas las tareas de la base de datos
        $tareas = Tarea::all();
        $categorias = Categoria::all();

        // Pasar las tareas a la vista
        return view('index', ['tareas' => $tareas, 'categorias' => $categorias]);
    }


    public function create()
    {
        // Obtener todas las tareas y categorias de la base de datos
        $tareas = Tarea::all();
        $categorias = Categoria::all();

        // Pasar las tareas a la vista
        return view('tareas/create', ['tareas' => $tareas, 'categorias' => $categorias]);
    }

    public function show($id)
    {
        $tarea = Tarea::find($id);
        $categorias = Categoria::all();
        return view('tareas/show', ['tarea' => $tarea, 'categorias' => $categorias]);
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'titulo' => 'required|min:3|max:255',
        ]);

        $tarea = Tarea::find($id);

        $tarea->titulo = $request->titulo;
        $tarea->descripcion = $request->descripcion;
        $tarea->categoria_id = $request->categoria_id;
        $tarea->save();

        return redirect()->route('mis-tareas')->with('update_success', '¡Tarea actualizada!');
    }

    public function delete($id)
    {
        $tarea = Tarea::find($id);
        $tarea->delete();

        return redirect()->route('mis-tareas')->with('update_success', '¡Tarea eliminada!');
    }


}
