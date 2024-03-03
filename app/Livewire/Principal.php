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
       $pendiente = Pendiente::create(
        $this->only('tarea','descripcion')
       );

       $this->reset(['tarea', 'descripcion', 'open']);

       $this-> pendientes= Pendiente::all();
    }

    public function toggleCompletada($pendienteId){
        $pendiente = Pendiente::find($pendienteId);
        $pendiente->completada = !$pendiente->completada;
        $pendiente->save();
    }

    public function delete($pendienteId){
         //Busca el id en el Modelo
         $pendiente = Pendiente::find($pendienteId);
         //Ejecuta la eliminacion
         $pendiente->delete();
         //Refresca los post
         $this->dispatch('post-deleted', 'Articulo eliminado');

         $this-> pendientes= Pendiente::all();

    }
    public function render()
    {
        return view('livewire.principal');
    }
}
