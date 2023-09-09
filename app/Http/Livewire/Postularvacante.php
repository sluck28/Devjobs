<?php

namespace App\Http\Livewire;

use App\Models\Candidato;
use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class Postularvacante extends Component
{   
    use WithFileUploads;

    public $cv,$vacante;
    //cremaos nuestras validaciones
    protected $rules=[
        //mimes para que solo acepte archivos pdf
        'cv'=>'required|mimes:pdf'
    ];

    function mount(Vacante $vacante) {

           $this->vacante=$vacante;
    }

    function postularme() 
    {   
        

        //validamos primero
        $datos=$this->validate();

        //almacenamos el cv en el disco duro
         $cv=$this->cv->store('public/cv');
         $datos ['cv']= str_replace('public/cv','',$cv);
        //creamos la vacante
        
        //primera forma
        // Candidato::create([
        //     'user_id'=>auth()->user()->id,
        //     'vacante_id'=>$this->vacante->id,
        //     'cv'=>$datos['cv']
        // ]);

        //segunda forma de crear la vacante con la relacion
            //no definimos la vacante ya que sabe que vacante es con la relacion
        $this->vacante->candidatos()->create
        ([
            'user_id'=>auth()->user()->id,
            'cv'=>$datos['cv']
        ]);
        //creamos una notificacion  y enviamos un email

        //en cual le pasamos los parametros
        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id,$this->vacante->titulo,auth()->user()->id));


        //mostramos al usuario  un mensaje de ok
        session()->flash('mensaje','se envio correctamente tu informacion mucha suerte');

        return redirect()->back();
    }


    public function render()
    {
        return view('livewire.postularvacante');
    }
}
