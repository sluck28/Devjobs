<?php

namespace App\Http\Livewire;

use App\Models\Salario;
use Livewire\Component;
use App\Models\Categoria;
use App\Models\Vacante;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class EditarVacante extends Component
{   
    public $titulo,$salario,$empresa,$ultimo_dia,$categoria,
    $descripcion,$imagen,$vacante_id,$imagen_nueva;

    use WithFileUploads;
    //nuestras reglas de validacion
    protected $rules=[
        'titulo' =>'required|string',
        'salario' =>'required',
        'categoria' =>'required',
        'empresa' =>'required',
        'ultimo_dia' =>'required',
        'descripcion' =>'required',
        //no se valida la imagen ya que no es obligatorio para eso usamos nullable para que pueda ir vacio
        'imagen_nueva' =>'nullable|image|max:1024'
        
    ];


    public function mount(Vacante $vacante)
    {
        $this->vacante_id=$vacante->id;
        $this->titulo = $vacante->titulo;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
        $this->ultimo_dia = Carbon::parse($vacante->ultimo_dia)->format('Y-m-d');
        $this->descripcion=$vacante->descripcion;
        $this->imagen=$vacante->imagen;

    }

    public function editarVacante()
    {
        $datos=$this->validate();

        //si hay una nueva imagen
        if($this->imagen_nueva){
            //la guardamos en el disco duro
            $imagen=$this->imagen_nueva->store('public/vacantes');
            //solo guardamos el nombre de la imagen
            $datos['imagen']=str_replace('public/vacantes/','',$imagen);

        }
        //encontrar la vacante a editar
        $vacante=Vacante::find($this->vacante_id);
        //asignar los valores
        $vacante->titulo=$datos['titulo'];
        $vacante->salario_id=$datos['salario'];
        $vacante->categoria_id=$datos['categoria'];
        $vacante->empresa=$datos['empresa'];
        $vacante->ultimo_dia=$datos['ultimo_dia'];
        $vacante->descripcion=$datos['descripcion']; 
        //igualamos la imagen al dato de imagen y si no es igual a la imagen anterior  
        $vacante->imagen=$datos['imagen'] ?? $vacante->imagen;
        //guardar la vacante 
        $vacante->save();
        //redireccionar
        session()->flash('mensaje','La vacante se actualizo correctamente');

        return redirect()->route('vacantes.index');

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
