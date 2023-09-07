<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class MostrarVacantes extends Component
{
    public function render()
    {   
        //asi traemos las vacantes del usuario que ha publicado
        $vacantes=Vacante::where('user_id',auth()->user()->id)->paginate(10);

        return view('livewire.mostrar-vacantes',[
            'vacantes' => $vacantes
        ]);
    }
}
