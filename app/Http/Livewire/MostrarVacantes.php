<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class MostrarVacantes extends Component
{
    //asi mandaamos a llamar nuestros eventos de livewire
    protected $listeners=['eliminar_vacante'];

    public function render()
    {   
        //asi traemos las vacantes del usuario que ha publicado
        $vacantes=Vacante::where('user_id',auth()->user()->id)->paginate(10);

        return view('livewire.mostrar-vacantes',[
            'vacantes' => $vacantes
        ]);
    }

    // public function prueba($vacante_id)
    // {
    //     dd($vacante_id);
    // }

    public function eliminar_vacante(Vacante $vacante)
    {
        //para eliminar la vacante
        $vacante->delete();

    }
}
