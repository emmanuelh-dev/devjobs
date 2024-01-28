<?php

namespace App\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{

    public $vacante;
    public $cv;
    use WithFileUploads;

    protected $rules = [
        'cv' => 'required|mimes:pdf|max:1024'
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }
    
    public function postularme()
    {
        $datos = $this->validate();
        // Almacenar el archivo en storage/app/cv
        $cv = $this->cv->store('public/cv');
        $datos['cv'] = str_replace('public/cv/', '', $cv);
        // Crear la vacante
        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $datos['cv'],
        ]);
        // Enviar email
        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id,$this->vacante->titulo, auth()->user()->id ));
        // Mostrar un mensaje
        session()->flash('mensaje', 'Te has postulado correctamente a la vacante, suerte!');
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
