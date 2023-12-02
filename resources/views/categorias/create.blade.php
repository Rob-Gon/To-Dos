@extends('app')

@section('content')

<div class="container w-25 border p-4 my-4" style="border-radius: 4px; background-color:whitesmoke;">
    <div class="row mx-auto">
        <form action="{{ route('categorias.store') }}" method="post">
            @csrf
            <!-- Campos del formulario -->
            <h2 class="mb-3 text-center"><b>NUEVA CATEGORIA</b></h2>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="titulo" placeholder="...">
                <label for="titulo">Titulo de la categoria</label>
            </div>
            <div class="form-control mb-3">
                <label for="color" class="form-label pt-2">Color de la categoria</label>
                <input type="color" class="form-control" name="color">
            </div>

            <!-- Mostrar mensajes de exito o error -->
            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif
            @error('titulo')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror

            <!-- Boton de submit -->
            <button type="submit" class="btn btn-primary">Crear categoria</button>
        </form>
    </div>
</div>


@endsection
