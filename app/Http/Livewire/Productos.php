<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;

class Productos extends Component
{
    //Definición de variables
    public $productos, $modal = false;
    public $id_producto, $codigo, $precio, $marca, $color, $cantidad, $tipo, $descripcion; 

    public function render()
    {
        $this->productos = Producto::all(); 
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
        Producto::updateOrCreate(['id'=>$this->id_producto],
        [                 
            'codigo' => $this->codigo,
            'precio' => $this->precio,       
            'marca' => $this->marca,  
            'color' => $this->color,
            'cantidad' => $this->cantidad,       
            'tipo' => $this->tipo, 
            'descripcion' => $this->descripcion,
        ]);
        $this->cerrarModal();
        $this->limpiarCampos();
    }

    public function editar($id)
    {
        $producto = Producto::findOrFail($id);
        $this->id_producto = $id;   
        $this->codigo = $producto->codigo;
        $this->precio = $producto->precio;    
        $this->marca = $producto->marca;
        $this->color = $producto->color;
        $this->cantidad = $producto->cantidad;
        $this->tipo = $producto->tipo;
        $this->descripcion = $producto->descripcion;
        $this->abrirModal();
    }

    public function eliminar($id)
    {
        Producto::find($id)->delete();
    }
}
