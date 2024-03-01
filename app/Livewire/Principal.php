<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pendiente;

class Principal extends Component
{

    public $open = false;
    public $tarea, $descripcion;
    public $pendientes;

    public function mount(){
        $this->pendientes = Pendiente::all();
    }

    public function post(){
        $this->open=true;
    }

    public function save(){
       $post = Pendiente::create(
        $this->only('tarea','descripcion')
       );

       $this->reset(['tarea', 'descripcion', 'open']);
    }

    public function toggleCompletada($pendienteId){
        $pendiente = Pendiente::find($pendienteId);
        $pendiente->completada = !$pendiente->completada;
        $pendiente->save();
    }


    public function render()
    {
        return view('livewire.principal');
    }
}
