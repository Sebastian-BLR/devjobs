<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    use WithFileUploads;
    public $cv;
    public $vacante;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Vacante $vacante)
    {
        $this -> vacante = $vacante;
    }

    public function postularme()
    {
        $datos = $this -> validate();
        
        
        // Almacenar Cv en el Servidor
        
        $cv = $this -> cv -> store('public/cv');
        $datos['cv'] = str_replace('public/cv/',"",$cv); 

        // Crear el candidato en la vacante
        $this -> vacante -> candidatos() -> create([
            'user_id' => Auth::id(),
            'cv'      => $datos['cv'],
        ]);

        // Crear Notificacion y enviar email
        $this -> vacante -> reclutador -> notify(new NuevoCandidato($this -> vacante -> id,
                                                                    $this -> vacante -> titulo,
                                                                    Auth::id() ));

        // Mostar al usuario un mensaje de exito
        session()->flash('mensaje', 'Se envió correctamente tu informacion, mucha suerte');
        return redirect() -> back();
    }
   
    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
