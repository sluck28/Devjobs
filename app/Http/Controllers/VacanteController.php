<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;

class VacanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //policy para que los reclutadores solo puedan ver esa vista
        $this->authorize('viewAny',Vacante::class);
        //mandamos a llamar desde el controlador
        return view('vacantes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //policy para que no puedan crear los demas usuarios vacantes

        $this->authorize('create',Vacante::class);

        return view('vacantes.create');


    }


    /**
     * Display the specified resource.
     */
    public function show(Vacante $vacante)
    {
        //
        return view('vacantes.show',[
            'vacante'=>$vacante
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacante $vacante)
    {
        //mandamos a llamar nuestra policies para no permitir la actualización de cualquier usuario
        $this->authorize('update',$vacante);


        return view('vacantes.edit',[
            'vacante'=>$vacante
        ]);
    }

    
   
}
