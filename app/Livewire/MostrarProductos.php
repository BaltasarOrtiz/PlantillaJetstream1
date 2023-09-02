<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Producto;
use Livewire\WithPagination;


class MostrarProductos extends Component
{
    use WithPagination;
    public $search='', $producto;
    public $open=false;
    public function render()
    {
        /*
        $productos = Producto::where('title', 'like','%'.$this->search.'%')
        ->orwhere('descripcion', 'like', '%'.$this->search.'%')
        ->paginate(12);
        return view('livewire.mostrar-productos', compact('productos'));*/

        return view('livewire.mostrar-productos', [
            'productos' => Producto::where('title', 'like','%'.$this->search.'%')
            ->orwhere('descripcion', 'like', '%'.$this->search.'%')
            ->paginate(12)
        ]);
    }

    public function mount(){
        $producto = Producto::first();
        if ($producto){
            $this->producto = $producto;
        }else{
            $this->producto = null;
        }
    }
    public function updatingSearch(){
        $this->resetPage();
    }
    public function mostrarProducto(Producto $producto){
        $this->producto = $producto;
        $this->open = true;
    }

}
