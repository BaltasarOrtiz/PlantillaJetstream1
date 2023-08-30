<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Producto;
use Livewire\WithPagination;


class CrudProductos extends Component
{
    use WithPagination;
    public $search='', $producto;
    public $open=false;
    public $sort = 'id';
    public $direction = 'desc';

    public $forSave;

    protected $rules = [
        'producto.title' => 'required',
        'producto.descripcion' => 'required',
        'producto.precio' => 'required',
        'producto.stock' => 'required',
        'producto.categoria' => 'required',
    ];

    public function render()
    {
        return view('livewire.crud-productos', [
            'productos' => Producto::where('title', 'like','%'.$this->search.'%')
            ->orwhere('descripcion', 'like', '%'.$this->search.'%')
            ->orderBy($this->sort, $this->direction)
            ->paginate(12)
        ]);
    }

    public function ordenar($sort){
        if ($sort != $this->sort) {
            $this->sort = $sort;
        }else{
            if ($this->direction == 'desc'){
                $this->direction = 'asc';
            }else{
                $this->direction = 'desc';
            }
        }
    }

    public function mount(){
        $this->producto = Producto::all();
    }
    public function updatingSearch(){
        $this->resetPage();
    }
    public function editar($p){
        $this->producto = $p;
        $this->open = true;
    }
    public function guardar(){
        $this->validate();
        $this->producto->save();
        $this->reset(['open']);
        #$this->emit('alerta', 'El producto se actualizo correctamente');
    }

}
