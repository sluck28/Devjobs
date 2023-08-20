<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
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
