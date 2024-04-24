@extends('students.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Student attendance information
                </div>
                <div class="float-end">
                    <a href="{{ route('students.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
            @foreach ($cant as $eachAssist)
                    <div class="row">
                        <label for="id" class="col-md-4 col-form-label text-md-end text-start"><strong>ID:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $eachAssist->id }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="student_id" class="col-md-4 col-form-label text-md-end text-start"><strong>Student ID:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $eachAssist->student_id }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="assist_date" class="col-md-4 col-form-label text-md-end text-start"><strong>Assist Date:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $eachAssist->assist_date }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="modified_at" class="col-md-4 col-form-label text-md-end text-start"><strong>Modified At:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $eachAssist->modified_at }}
                        </div>
                    </div>
              @endforeach
            </div>
        </div>
    </div>    
</div>
    
@endsection