<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Param;



class DashboardController extends Controller
{
    public static function getStudentsAssists(){
      $distinctStudentsAssists = DB::table('assists')
             ->join('students','assists.student_id','=','students.id')
             ->select(DB::raw('count(*) as assist_count, students.id'))
             ->groupBy('students.id')
             ->get();
      
    //dd($distinctStudentsAssists);
      return $distinctStudentsAssists;
    }
  
  public static function getParams(){
    $params = Param::all();
    return $params;
  }

  public function determineRegularized(){
    $params = $this->getParams();
    //dd($params[0]->regular);
    $distinctStudentsAssists = $this->getStudentsAssists();
    //dd($distinctStudentsAssists[0]->assist_count);
    $avg = [];
    for ($i=0; $i < count($distinctStudentsAssists); $i++) {
      $calculate = (($distinctStudentsAssists[$i]->assist_count)*($params[0]->total_classes)/100)*100;
      if(($calculate >= $params[0]->regular) && ($calculate < $params[0]->promote)){
        $avg[$i] = $calculate;
      }
    }
    return $avg;
  }


  public function determinePromote()
  {


  }


  public function determineAuditor()
  {


  }

    public static function countAllAssists(){
      $allAssists = DB::table('assists')->count();
      return $allAssists;
    }

    public function compactData(){
      
    }
}
