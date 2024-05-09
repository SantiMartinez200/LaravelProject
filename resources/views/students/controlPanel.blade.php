@extends('layouts.app')
@section('content')
<div class="row justify-content-center mt-3">
  <div class="col-md-12">
    <div class="container">
      <div class="card">
        <div class="card-header">Listado de Parametros</div>
        <div class="card-body">
          <a href="" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i>
            Cargar parámetros</a>
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th scope="col">ID del registro</th>
                <th scope="col">Promoción</th>
                <th scope="col">Regular</th>
                <th scope="col">Creado el</th>
                <th scope="col">Modificado el</th>
                <th scope="col">Acción</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($params as $eachParam)
        <tr>
        <th scope="row">{{ $eachParam->id }}</th>
        <td>{{ $eachParam->promote }}</td>
        <td>{{ $eachParam->regular }}</td>
        <td>{{ $eachParam->created_at }}</td>
        <td>{{ $eachParam->updated_at }}</td>
        <td>
        <form action="" method="post">
          @csrf
          <a href="" class="btn btn-primary btn-sm m-1"><i
              class="bi bi-pencil-square"></i>Editar</a>
          <button type="submit" class="btn btn-danger btn-sm"
            onclick="return confirm('¿Estás seguro de eliminar el Parámetro? Se frenará el funcionamiento del sistema.');"><i
              class="bi bi-trash"></i>Eliminar</button>
        </form>
        </td>
        </tr>
      @empty
    <td colspan="6">
      <span class="text-danger">
      <strong>No hay parámetros registrados!</strong>
      </span>
    </td>
  @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection