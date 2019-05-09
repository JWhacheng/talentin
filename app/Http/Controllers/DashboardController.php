<?php

namespace App\Http\Controllers;

use App\Postulante;
use Illuminate\Http\Request;

class DashboardController extends Controller
{



  public function index() {

      return view('dashboard', [
        'postulantesPendientes' =>  Postulante::where('estado', 0)->get(),
        'cantPendientes' => Postulante::where('estado', 0)->count()
      ]);
  }

}
