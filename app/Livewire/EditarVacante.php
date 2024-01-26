<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditarVacante extends Component
{
    public $vacante_id;
    public $titulo;
    public $categoria;
    public $experiencia;
    public $empresa;
    public $salario;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;
    public $imagen_nueva;

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required|min:8',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required|min:8',
        'imagen_nueva' => 'nullable|image'
    ];
    public function mount(Vacante $vacante)
    {
        $this->vacante_id = $vacante->id;
        $this->titulo = $vacante->titulo;
        $this->categoria = $vacante->categoria_id;
        $this->experiencia = $vacante->experiencia_id;
        $this->empresa = $vacante->empresa;
        $this->salario = $vacante->salario_id;
        $this->ultimo_dia = $vacante->ultimo_dia;
        $this->descripcion = $vacante->descripcion;
        $this->imagen = $vacante->imagen;
    }


    public function editarVacante()
    {
        $datos = $this->validate();
        $datos['imagen'] = $this->imagen;
        // Revisar si hay una nueva imagen
        if($this->imagen_nueva){
            $imagen = $this->imagen_nueva->store('public/vacantes');
            $datos['imagen'] = str_replace('public/vacantes/', '', $imagen );
        }
        // Asoaciando los datos
        $vacante = Vacante::find($this->vacante_id);
        // Guardamos la vacante
        $vacante->titulo = $datos['titulo'];
        $vacante->salario_id = $datos['salario'];
        $vacante->categoria_id = $datos['categoria'];
        $vacante->empresa = $datos['empresa'];
        $vacante->ultimo_dia = $datos['ultimo_dia'];
        $vacante->descripcion = $datos['descripcion'];
        $vacante->imagen = $datos['imagen'];

        $vacante->save();

        // Redirect
        session()->flash('mensaje', 'Vacante actualizada correctamente');
        return redirect()->route('vacantes.index');
    }


    public function render()
    {
        // Consultamos la base de datos, para pasar la info
        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.editar-vacante', ['salarios' => $salarios, 'categorias' => $categorias]);
    }
}
