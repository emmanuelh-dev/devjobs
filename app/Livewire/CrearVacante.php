<?php

namespace App\Livewire;

use App\Models\Salario;
use Livewire\Component;

class CrearVacante extends Component
{   
    public function crearVacante(){
        
    }

    public function render()
    {   // Consultamos la base de datos, para pasar la info
        $salarios = Salario::all();
        return view('livewire.crear-vacante', [
            'salarios' => $salarios]);
    }
}
