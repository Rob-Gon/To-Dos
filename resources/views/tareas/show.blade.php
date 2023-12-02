@extends('app')

@section('content')

<div class="container w-25 border p-4 mt-3" style="border-radius: 4px; background-color:whitesmoke;">
    <form action="{{ route('tareas-update', ['id' => $tarea->id]) }}" method="post">
        @csrf
        @method('patch')
        <!-- Campos del formulario -->
        <h2 class="mb-3 text-center"><b>TAREA</b></h2>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="titulo" value="{{ $tarea->titulo }}" placeholder="...">
            <label for="titulo">Titulo de la tarea</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="descripcion" value="{{ $tarea->descripcion }}" placeholder="...">
            <label for="descripcion">Descripcion de la tarea</label>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select" name="categoria_id">
                @foreach ($categorias as $categoria)
                    <option style="color: {{$categoria->color}};" value="{{ $categoria->id }}">{{ $categoria->titulo }}</option>
                @endforeach
            </select>
            <label for="categoria_id" class="form-label">Categoria de la tarea</label>
        </div>

        @error('titulo')
            <h6 class="alert alert-danger">{{ $message }}</h6>
        @enderror

        <!-- Boton de submit -->
        <button type="submit" class="btn btn-primary">Actualizar tarea</button>
    </form>
</div>

@endsection
