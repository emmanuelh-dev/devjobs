<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{
    public $titulo;
    public $descripcion;
    public $categoria;
    public $salario;
    public $ultimo_dia;
    public $empresa;
    public $imagen;

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required|min:8',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required|min:8',
        'imagen' => 'required|image'
    ];

    public function crearVacante()
    {
        $this->validate();
    }

    public function render()
    {   // Consultamos la base de datos, para pasar la info
        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.crear-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
