<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Param;

class ParamController extends Controller
{
  public function getParams()
  {
    $params = Param::all();
    return view('students.controlPanel',compact('params'));
  }
}
