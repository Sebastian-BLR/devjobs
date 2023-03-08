<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MostrarVacantes extends Component
{
    protected $listeners = ['eliminarVacante'];
    
    public function eliminarVacante(Vacante $vacante)
    {
        $vacante -> delete();
    }
 
    public function render()
    {
        $vacantes = Vacante::where('user_id', Auth::id())-> paginate(10);

        return view('livewire.mostrar-vacantes',[
            'vacantes' => $vacantes,
        ]);
    }
}
