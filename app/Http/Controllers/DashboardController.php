<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Param;
use App\Models\Student;



class DashboardController extends Controller
{
    public static function getStudentsAssists(){
      $distinctStudentsAssists = DB::table('assists')
             ->join('students','assists.student_id','=','students.id')
             ->select(DB::raw('count(*) as assist_count, students.id,students.name,students.last_name,students.dni_student'))
             ->groupBy('students.id')
             ->get();
            return $distinctStudentsAssists;
    }
  
  public static function getParams(){
    $params = Param::all();
    return $params;
  }

  public function determineRegularized(){
    $params = $this->getParams();
    $distinctStudentsAssists = $this->getStudentsAssists();
    $avgRegularized = 0;
    for ($i=0; $i < count($distinctStudentsAssists); $i++) {
      $calculate = (($distinctStudentsAssists[$i]->assist_count)*($params[0]->total_classes)/100)*100;
      if(($calculate >= $params[0]->regular) && ($calculate < $params[0]->promote)){
        $avgRegularized = $avgRegularized + 1;
      }
    }
    return $avgRegularized;
  }


  public function determinePromoted()
  {
    $params = $this->getParams();
    $distinctStudentsAssists = $this->getStudentsAssists();
    //dd($distinctStudentsAssists[0]->assist_count);
    $avgPromoted = 0;
    for ($i = 0; $i < count($distinctStudentsAssists); $i++) {
      $calculate = (($distinctStudentsAssists[$i]->assist_count) * ($params[0]->total_classes) / 100) * 100;
      if (($calculate >= $params[0]->promote)) {
        $avgPromoted = $avgPromoted + 1;
      }
    }
    return $avgPromoted;
  }


  public function determineAuditor()
  {
    $params = $this->getParams();
    $distinctStudentsAssists = $this->getStudentsAssists();
    $avgAuditor = 0;
    for ($i = 0; $i < count($distinctStudentsAssists); $i++) {
      $calculate = (($distinctStudentsAssists[$i]->assist_count) * ($params[0]->total_classes) / 100) * 100;
      if (($calculate < $params[0]->regular)) {
        $avgAuditor = $avgAuditor + 1;
      }
    }
    return $avgAuditor;
  }

    public static function countAllAssists(){
      $allAssists = DB::table('assists')
      ->join('students', 'assists.student_id', '=', 'students.id')
      ->select(DB::raw('students.id,students.name,students.last_name,students.dni_student'))
      ->get()
      ->count();
      return $allAssists;
    }

    public function compactData(){
        $promoted = $this->determinePromoted();
        $regularized = $this->determineRegularized();
        $auditor = $this->determineAuditor();
        $total_assists = $this->countAllAssists();
      $results = ['promoted' => $promoted, 'regularized' => $regularized, 'auditor' => $auditor, 'total_assists' => $total_assists];

    return view('dashboard.dashboard',compact('results'));
    }
}
