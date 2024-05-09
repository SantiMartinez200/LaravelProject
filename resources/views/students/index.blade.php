@extends('layouts.app')
@section('content')
<div class="row justify-content-center mt-3">
  <div class="col-md-12">
    @if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert">
    {{ $message }}
    </div>
  @endif
    <div class="container">
      <div class="card">
        <div class="card-header">Students List</div>
        <div class="card-body">
          <a href="{{ route('students.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i>
            Add New Student</a>
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">DNI</th>
                <th scope="col">Name</th>
                <th scope="col">Last name</th>
                <th scope="col">Birthday</th>
                <th scope="col">Group</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($students as $student)
        <tr>
          <th scope="row">{{ $student->id }}</th>
          <td>{{ $student->dni_student }}</td>
          <td>{{ $student->name }}</td>
          <td>{{ $student->last_name }}</td>
          <td>{{ $student->birthday }}</td>
          <td>{{ $student->group_student }}</td>
          <td>
          <form action="{{ route('students.destroy', $student->id) }}" method="post">
            @csrf
            @method('DELETE')

            <a href="{{ route('students.show', $student->id) }}" class="btn btn-warning btn-sm m-1"><i
              class="bi bi-eye"></i>Ver</a>

            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary btn-sm m-1"><i
              class="bi bi-pencil-square"></i>Editar</a>

            <a href="{{route('StudentAssist', $student->id)}}" class="btn btn-success btn-sm m-1"><i
              class="bi bi-eye"></i>Asistencias</a>

            <button type="submit" class="btn btn-danger btn-sm"
            onclick="return confirm('¿Estás seguro de eliminar el Estudiante? Sus asistencias también se eliminarán.');"><i
              class="bi bi-trash"></i>Eliminar</button>
          </form>
          </td>

        </tr>
      @empty
    <td colspan="6">
      <span class="text-danger">
      <strong>No hay estudiantes registrados!</strong>
      </span>
    </td>
  @endforelse
            </tbody>
          </table>

          {{ $students->links() }}

        </div>
      </div>
    </div>
  </div>
</div>

@endsection