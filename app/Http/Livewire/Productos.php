<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Enum;

class Productos extends Component
{
    //Definición de variables
    public $productos, $modal = false;
    public $id_producto, $codigo, $precio, $marca, $color, $cantidad, $tipo, $descripcion, $user_id;    

    //Reglas de validación
    protected $rules = [
        'codigo' => 'required|min:5|max:10',
        'precio' => 'required',
        'marca' => 'required|max:50',
        'color' => 'required|max:50',
        'cantidad' => 'required|min:0',
        'tipo' => 'required|max:50',
        'descripcion' => 'min:0|max:100',
    ];

    public function render()
    {        
        $this->productos = Auth::user()->productos; 
        return view('livewire.productos');
    }

    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal();
    }

    public function limpiarCampos()
    {        
        $this->codigo = '';
        $this->precio = '';
        $this->marca = '';
        $this->color = '';
        $this->cantidad = '';
        $this->tipo = '';
        $this->descripcion = '';
        $this->user_id = '';
    }

    public function abrirModal()
    {
        $this->modal = true;
    }

    public function cerrarModal()
    {
        $this->modal = false;
    }

    public function guardar()
    {      
        $validateData = $this->validate();
        Producto::updateOrCreate(['id'=>$this->id_producto],
        [                 
            'codigo' => $this->codigo,
            'precio' => $this->precio,       
            'marca' => $this->marca,  
            'color' => $this->color,
            'cantidad' => $this->cantidad,       
            'tipo' => $this->tipo, 
            'descripcion' => $this->descripcion,
            'user_id' => Auth::id(),
        ]);
        session()->flash('message', 
            $this->id_producto ? 'Actualizado exitosamente' : 'Guardado exitosamente'
        );
        $this->cerrarModal();
        $this->limpiarCampos();
    }

    public function editar($id)
    {
        $producto = Producto::findOrFail($id);        
        $this->validateOnly($producto);
        $this->id_producto = $id;   
        $this->codigo = $producto->codigo;
        $this->precio = $producto->precio;    
        $this->marca = $producto->marca;
        $this->color = $producto->color;
        $this->cantidad = $producto->cantidad;
        $this->tipo = $producto->tipo;
        $this->descripcion = $producto->descripcion;
        $this->user_id = $producto->user_id;
        $validateData = $this->validate();
        $this->abrirModal();
    }

    public function eliminar($id)
    {
        Producto::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }   

}
