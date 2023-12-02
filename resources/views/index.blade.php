@extends('app')

@section('content')

<div class="container w-25 border p-4 mt-3" style="border-radius: 4px; background-color:whitesmoke;">
    <div>
        <h2 class="mb-3 text-center"><b>MIS TAREAS</b></h2>
        @if (session('update_success'))
            <h6 class="alert alert-success">{{ session('update_success') }}</h6>
        @endif
        @foreach ($tareas as $tarea)
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
                <div class="col-md-9 d-flex justify-content-start pt-2">
                    <div class="text-muted">{{ $tarea->descripcion }}</div>
                </div>
                @foreach ($categorias as $categoria)
                @if($categoria->id == $tarea->categoria_id)
                    <div class="col-md-9 d-flex align-items-center pt-2">
                        <p class="d-flex align-items-center gap-2">Categoria:
                        <span class="color-container" style="background-color: {{ $categoria->color }}; border-radius: 100%; width: 20px; height: 20px;"></span>{{ $categoria->titulo }}
                        </p>
                    </div>
                @endif
                @endforeach
            </div>
        @endforeach
    </div>
</div>

@endsection
