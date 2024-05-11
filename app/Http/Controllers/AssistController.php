<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Assist;
use App\Models\Student;
use App\Http\Requests\AssistRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\IsEmpty;

class AssistController extends Controller
{
  /*public function store(AssistRequest $request): RedirectResponse
  {
    Assist::create($request->all());
    return redirect()->route('signView')
      ->withSuccess('Se ha marcado la asistencia del alumno');
  }                                                                    -> Not currently used.*/

  public static function ValidateDate($id){
    $todayDate = Carbon::now()->setTimezone('America/Argentina/Buenos_Aires')->format('Y-m-d') . '%';
    $studentDate = DB::table('assists')
                       ->where('created_at', 'LIKE',$todayDate)
                       ->get();
    if ($studentDate->IsEmpty()) {
      return true; //Cargar asistencia.
    }else{
      return false; //No cargar la asistencia
    }
  }

  public function storeFromButton($id)
  {
    $bool = $this->ValidateDate($id);
    if ($bool == true) {
      $assist = Assist::create(['student_id' => $id]);
      return redirect()->route('signView')->withSuccess('Se ha marcado la asistencia del alumno');
    }else{
      return redirect()->route('signView')->with('error','Este Estudiante ya ha asistido hoy.');
    }
  }

  
}
