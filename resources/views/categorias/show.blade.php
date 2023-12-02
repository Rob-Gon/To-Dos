@extends('app')

@section('content')

<div class="container w-25 border p-4 mt-3" style="border-radius: 4px; background-color:whitesmoke;">
    <form action="{{ route('categorias.update', ['categoria' => $categoria->id]) }}" method="post">
        @csrf
        @method('patch')
        <!-- Campos del formulario -->
        <h2 class="mb-3 text-center"><b>CATEGORIA</b></h2>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="titulo" value="{{ $categoria->titulo }}" placeholder="...">
            <label for="titulo">Titulo de la categoria</label>
        </div>
        <div class="form-control mb-3">
            <label for="color" class="form-label pt-2">Color de la categoria</label>
            <input type="color" class="form-control" name="color" value="{{ $categoria->color }}">
        </div>

        @error('titulo')
            <h6 class="alert alert-danger">{{ $message }}</h6>
        @enderror

        <!-- Boton de submit -->
        <button type="submit" class="btn btn-primary">Actualizar categoria</button>
    </form>

    </div>
        @if ($categoria->tareas->count() > 0)
        <div class="container w-25 border p-4 mt-3" style="border-radius: 4px; background-color:whitesmoke;">
        @foreach ($categoria->tareas as $tarea)
        <div class="row py-3 px-2" style="background-color: white; border-radius:4px">
            <div class="col-md-9 d-flex align-items-center">
                <a href="{{ route('tareas-update', ['id' => $tarea->id]) }}">{{ $tarea->titulo }}</a>
            </div>
            <div class="col-md-3 d-flex justify-content-end">
                <form action="{{ route('tareas-delete', [$tarea->id]) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </div>
            <div class="col-md-12 d-flex justify-content-start pt-3">
                <div class="text-muted">{{ $tarea->descripcion }}</div>
            </div>
        </div>
        @endforeach
        </div>
        @else
            <h6 class="container w-25 border p-4 mt-3 alert alert-danger">No hay tareas en esta categoria</h6>
        @endif
    </div>

</div>

@endsection
