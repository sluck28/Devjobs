<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
//para subir algun archivo en livewire
use Livewire\WithFileUploads;

class CrearVacante extends Component
{
    public $titulo,$salario,$categoria,$empresa,$ultimo_dia,$descripcion,$imagen;

    use WithFileUploads;

    protected $rules=[
        'titulo' =>'required|string',
        'salario' =>'required',
        'categoria' =>'required',
        'empresa' =>'required',
        'ultimo_dia' =>'required',
        'descripcion' =>'required',
        'imagen' =>'required|image|max:1024'
    ];


    public function crearVacante()
    {
        $datos=$this->validate();
        //almacenaremos la imagen
        //en store ponemos la ruta donde se almacena la imagen
        $imagen=$this->imagen->store('public/vacantes');
        //para solo guardar el nombre del archivo
        $nombre_imagen=str_replace('public/vacantes/','',$imagen);
    
        //crear la vacante
        Vacante::create([
            'titulo'=>$datos['titulo'],
            'salario_id'=>$datos['salario'],
            'categoria_id'=>$datos['categoria'],
            'empresa'=>$datos['empresa'],
            'ultimo_dia'=>$datos['ultimo_dia'],
            'descripcion'=>$datos['descripcion'],
            'imagen'=>$nombre_imagen,
            'user_id'=>auth()->user()->id,
        ]);

        //mandar un mensaje de que la vancanta se registro con exito
        session()->flash('mensaje','la vacante se publico correctamente');
        //redireccionar al usuario
        return redirect()->route('vacantes.index');

    }

    public function render()
    {    
        //consultar los salarios

        $salarios=Salario::all();
        $categorias=Categoria::all();      
        return view('livewire.crear-vacante', 
            [
                'salarios'=>$salarios,
                'categorias'=>$categorias
            ]
            );
    }



}
