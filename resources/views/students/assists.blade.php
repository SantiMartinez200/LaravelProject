@extends('students.layouts')

@section('content')
<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">{{$student->name}} {{$student->last_name}}</div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Student ID</th>
                        <th scope="col">Assist Date</th>
                        <th scope="col">Updated at</th>
                        <th scope="col">Condition</th>
                        <th scope="col">Action</th>

                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($cant as $eachStudent)
                        <tr>
                            <td>{{ $eachStudent->student_id }}</td>
                            <td>{{ \Carbon\Carbon::parse($eachStudent->assist_date)->format('j F, Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($eachStudent->modified_at)->format('j F, Y') }}</td>
                            <td><a href="StudentCondition" class="btn btn-secondary">Show Condition</a></td>
                            <td>No Action</td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No Assists Found!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>
            </div>
        </div>
    </div>    
</div>
    
@endsection