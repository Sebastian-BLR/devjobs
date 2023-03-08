<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{   
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    protected $rules = [
        'titulo'      => 'required|string',
        'salario'     => 'required',
        'categoria'   => 'required',
        'empresa'     => 'required',
        'ultimo_dia'  => 'required',
        'descripcion' => 'required',
        'imagen'      => 'required|image|max:1024',
    ];

    use WithFileUploads;

    public function crearVacante()
    {
        $datos = $this -> validate();
        // Almacenar la imagen
        $imagen = $this -> imagen -> store('public/vacantes');
        $datos['imagen'] = str_replace('public/vacantes/',"",$imagen); 
        
        // crear la Vacante
        Vacante::create([
            'titulo'       => $datos['titulo'],
            'salario_id'   => $datos['salario'],
            'categoria_id' => $datos['categoria'],
            'empresa'      => $datos['empresa'],
            'ultimo_dia'   => $datos['ultimo_dia'],
            'descripcion'  => $datos['descripcion'],
            'imagen'       => $datos['imagen'],
            'user_id'      => Auth::id(),
        ]);
        // Crear un mensaje
        session() -> flash('mensaje', 'La vacante ' . $datos['titulo'] . ' se publicó correctamente');

        // Redireccionar al usuario
        return redirect()-> route('vacantes.index');
    }


    public function render()
    {
        // Consultar Salario
        $salarios   = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.crear-vacante', [
            'salarios'  => $salarios,
            'categorias' => $categorias
        ]);
    }
}
