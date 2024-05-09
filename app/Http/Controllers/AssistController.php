<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assist;
use App\Models\Student;
use App\Http\Requests\AssistRequest;
use Illuminate\Http\RedirectResponse;

class AssistController extends Controller
{
  /*public function store(AssistRequest $request): RedirectResponse
  {
    Assist::create($request->all());
    return redirect()->route('signView')
      ->withSuccess('Se ha marcado la asistencia del alumno');
  }                                                                    -> Not currently used.*/

  public function storeFromButton($id)
  {
    $assist = Assist::create(['student_id' => $id]);
    return redirect()->route('signView')->withSuccess('Se ha marcado la asistencia del alumno');
  }
}
