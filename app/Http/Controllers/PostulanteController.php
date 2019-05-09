<?php

namespace App\Http\Controllers;

use App\Postulante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostulanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('lista', [
         'postulantes' => Postulante::all()
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agregar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataValida = $request->validate([
            'primerNombre' => 'bail|required|min:2',
            'primerApellido' => 'bail|required|min:2',
            'segundoApellido' => 'bail|required|min:2',
            'dni' => 'bail|required|digits:8',
            'email' => 'bail|required|email',
            'celular' => 'bail|required|digits:9',
            'direccion' => 'bail|required|min:5',
            'ciudad' => 'bail|required',
            'carrera' => 'bail|required',
            'ciclo' => 'bail|required',
            'curriculum' => 'bail|required'
        ]);

        $postulante = new Postulante();

        if ($request->hasFile('curriculum')) {
           $curriculum = $request->file('curriculum');
           $name = str_slug($request->dni).'.'.$curriculum->getClientOriginalExtension();
           $destinationPath = public_path('/uploads/files');
           $curriculumPath = $destinationPath. "/".  $name;
           $curriculum->move($destinationPath, $name);
           $postulante->url_cv = $name;
        }

        if ($request->get('carrera') == 1) {
          $postulante->carrera = "Ingeniería Industrial";
        }elseif ($request->get('carrera') == 2) {
          $postulante->carrera = "Ingeniería de Sistemas";
        }elseif ($request->get('carrera') == 3) {
          $postulante->carrera = "Marketing";
        }elseif ($request->get('carrera') == 4) {
          $postulante->carrera = "Psicología";
        }

        $postulante->primer_nombre = $request->get('primerNombre');
        $postulante->segundo_nombre = $request->get('segundoNombre');
        $postulante->primer_apellido = $request->get('primerApellido');
        $postulante->segundo_apellido = $request->get('segundoApellido');
        $postulante->dni = $request->get('dni');
        $postulante->email = $request->get('email');
        $postulante->celular = $request->get('celular');
        $postulante->ciudad = $request->get('ciudad');
        $postulante->direccion = $request->get('direccion');
        $postulante->ciclo = $request->get('ciclo');
        $postulante->save();

        return redirect('/postulantes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $postulante = Postulante::findOrFail($id);
        return view('detalle',[
          'postulante' => $postulante
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postulante = Postulante::findOrFail($id);
        return view('editar',[
          'postulante' => $postulante
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataValida = $request->validate([
            'primerNombre' => 'bail|required|min:2',
            'primerApellido' => 'bail|required|min:2',
            'segundoApellido' => 'bail|required|min:2',
            'dni' => 'bail|required|digits:8',
            'email' => 'bail|required|email',
            'celular' => 'bail|required|digits:9',
            'direccion' => 'bail|required|min:5',
            'ciudad' => 'bail|required',
            'carrera' => 'bail|required',
            'ciclo' => 'bail|required'
        ]);

        $postulante = Postulante::findOrFail($id);

        if ($request->hasFile('curriculum')) {
           $curriculum = $request->file('curriculum');
           $name = str_slug($request->dni).'.'.$curriculum->getClientOriginalExtension();
           $destinationPath = public_path('/uploads/files');
           $curriculumPath = $destinationPath. "/".  $name;

           if (Storage::exists($curriculumPath)) {
              Storage::delete($curriculumPath);
          }

           $curriculum->move($destinationPath, $name);
           $postulante->url_cv = $name;
        }


        if ($request->get('carrera') == 1) {
          $postulante->carrera = "Ingeniería Industrial";
        }elseif ($request->get('carrera') == 2) {
          $postulante->carrera = "Ingeniería de Sistemas";
        }elseif ($request->get('carrera') == 3) {
          $postulante->carrera = "Marketing";
        }elseif ($request->get('carrera') == 4) {
          $postulante->carrera = "Psicología";
        }

        $postulante->primer_nombre = $request->get('primerNombre');
        $postulante->segundo_nombre = $request->get('segundoNombre');
        $postulante->primer_apellido = $request->get('primerApellido');
        $postulante->segundo_apellido = $request->get('segundoApellido');
        $postulante->dni = $request->get('dni');
        $postulante->email = $request->get('email');
        $postulante->celular = $request->get('celular');
        $postulante->ciudad = $request->get('ciudad');
        $postulante->direccion = $request->get('direccion');
        $postulante->ciclo = $request->get('ciclo');
        $postulante->estado = 0;
        $postulante->save();

        return redirect('/postulantes/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postulante = Postulante::findOrFail($id);
        $postulante->delete();

        return redirect('/postulantes');
    }

    public function actualizarEstado(Request $request)
    {
      $id = $request->estado;
      $postulante = Postulante::findOrFail($id);
      $postulante->estado = 1;
      $postulante->save();

      return redirect('/postulantes/' . $id);

    }

}
