@extends('app')

@section('content')

<div class="container w-25 border p-4 mt-3" style="border-radius: 4px; background-color:whitesmoke;">
    <div>
        <h2 class="mb-3 text-center"><b>MIS CATEGORIAS</b></h2>
        @if (session('update_success'))
            <h6 class="alert alert-success">{{ session('update_success') }}</h6>
        @endif
        @foreach ($categorias as $categoria)
            <div class="row py-3 px-2" style="background-color: white; border-radius:4px">
                <div class="col-md-9 d-flex align-items-center">
                    <a class="d-flex align-items-center gap-2" href="{{ route('categorias.show', ['categoria' => $categoria->id]) }}">
                    <span class="color-container" style="background-color: {{ $categoria->color }}; border-radius: 100%; width: 20px; height: 20px;"></span>{{ $categoria->titulo }}
                    </a>
                </div>
                <div class="col-md-3 d-flex justify-content-end">
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-{{$categoria->id}}">Eliminar</button>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modal-{{$categoria->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    ¿Está seguro de eliminar la categoria <b>{{ $categoria->titulo }}</b>? Todas las tareas asociadas a la categoria se eliminaran.
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <form action="{{ route('categorias.destroy', [$categoria->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                    </div>
                </div>
                </div>
            </div>
        @endforeach
    </div>
</div>



@endsection
