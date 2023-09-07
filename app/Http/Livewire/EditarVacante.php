<?php

namespace App\Http\Livewire;

use App\Models\Salario;
use Livewire\Component;
use App\Models\Categoria;
use App\Models\Vacante;
use Carbon\Carbon;

class EditarVacante extends Component
{   
    public $titulo,$salario,$empresa,$ultimo_dia,$categoria,
    $descripcion,$imagen;

    public function mount(Vacante $vacante)
    {
        $this->titulo = $vacante->titulo;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
        $this->ultimo_dia = Carbon::parse($vacante->ultimo_dia)->format('Y-m-d');
        $this->descripcion=$vacante->descripcion;

    }

    public function render()
    {   
        $salarios=Salario::all();
        $categorias=Categoria::all();  
        return view('livewire.editar-vacante',
        [
        'salarios'=>$salarios, 
        'categorias'=>$categorias
        ]
    );
    }
}
