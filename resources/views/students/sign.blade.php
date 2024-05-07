@extends('layouts.app')
@section('content')
<div class="row justify-content-center mt-3">
    <div class="col-md-8">
     <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    <strong>Coloca tu DNI en el campo</strong>
                </div>
                <div class="float-end">
                    <a href="{{ route('students.index') }}" class="btn btn-primary btn-sm">&larr; Volver</a>
                </div>
            </div>
            <div class="card-body">
             <div class="container"> 
              <form action="{{route('signForm')}}" method="get"> 
                @csrf    
                <div class="row align-items-center">
                  <div class="col-sm">
                    <input type="number" name="student_id" class="form-control form-control-sm">
                    @if ($errors->has('student_id'))
                                <span class="text-danger">{{ $errors->first('student_id') }}</span>
                            @endif
                    <input type="timestamp" name="assist_date" value="{{$myDate}}">
                    @if ($errors->has('assist_date'))
                                <span class="text-danger">{{ $errors->first('assist_date') }}</span>
                            @endif
                  </div>
                  <div class="col-sm">
                    <input type="submit" value="Asistir!" class="form-control btn btn-success m-2">
                  </div>
                  <div class="col"></div>
                  <div class="col"></div>
                </div>
              </form>
             </div>
            </div>
        </div>
      </div>
    </div>    
</div>
@endsection