<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
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
        $datos = $this->validate();

        // Almacenar la imagen

        $imagen = $this->imagen->store('public/vacantes');
        $nombre_imagen = str_replace('public/vacantes/', '', $imagen);

        // Crear la vacante

        Vacante::create([
            'titulo' => $datos['titulo'],
            'salario_id' => $datos['salario'],
            'categoria_id' => $datos['categoria'],
            'empresa' => $datos['empresa'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'descripcion' => $datos['descripcion'],
            'imagen' => $nombre_imagen,
            'user_id' => auth()->user()->id,
        ]);

        // Creamos un mensaje
        session()->flash('mensaje', 'Vacante creada correctamente');

        // Redireccionar al usuario

        return redirect()->route('vacantes.index');

    }

    public function render()
    {
        // Consultamos la base de datos, para pasar la info
        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.crear-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
