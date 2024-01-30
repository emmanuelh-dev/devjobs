<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use Livewire\Component;

class FiltrarVacantes extends Component
{   
    public $categoria;
    public $salario;
    public $termino;

    public function leerDatosFormulario()
    {
        $this->dispatch('filtrarVacantes', $this->termino, $this->categoria, $this->salario);
    }
    public function render()
    {
        $categorias = Categoria::all();
        $salarios = Salario::all();

        return view('livewire.filtrar-vacantes', [
            'salarios' => $salarios,
            'categorias' => $categorias,
        ]);
    }
}
