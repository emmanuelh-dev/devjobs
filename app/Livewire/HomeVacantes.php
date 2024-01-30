<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class HomeVacantes extends Component
{
    public $termino;
    public $categoria;
    public $salario;

    protected $listeners = ['filtrarVacantes'=>'filtrarVacantes'];

    public function filtrarVacantes($termino, $categoria, $salario){
        $this->termino = $termino;
        $this->categoria = $categoria;
        $this->salario = $salario;
    }
    public function render()
    {
        $vacantes = Vacante::when($this->termino, function($query){
            $query->where('titulo', 'like', '%'.$this->termino.'%');
        })->when('$this->categoria', function($query){
            $query->where('categoria_id', 'like', '%'.$this->categoria.'%');
        })->when('$this->salario', function($query){
            $query->where('salario_id', 'like', '%'.$this->salario.'%');
        })->get();

        return view('livewire.home-vacantes', [
            'vacantes' => $vacantes,
        ]);
    }
}
