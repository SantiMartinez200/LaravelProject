<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assist;
use App\Http\Requests\AssistRequest;
use Illuminate\Http\RedirectResponse;

class AssistController extends Controller
{

  public function getTodayDate()
  {
    $myDate = \Carbon\Carbon::now();
    return view('students.sign', compact('myDate'));
  }
  public function store(AssistRequest $request): RedirectResponse
  {
    Assist::create($request->all());
    return redirect()->route('signform')
      ->withSuccess('Se ha marcado la asistencia del alumno');
  }
}
