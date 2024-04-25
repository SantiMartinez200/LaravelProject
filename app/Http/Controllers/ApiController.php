<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    Public function studentCondition($id): String
    {
        $student = Student::find($id);
        $cant = $student->assists;
        dd($cant);
        
    }   
}
