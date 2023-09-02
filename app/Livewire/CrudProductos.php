<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Producto;
use Livewire\WithPagination;


class CrudProductos extends Component
{
    use WithPagination;
    public $search='', $producto, $producto2, $image;
    public $open=false;
    public $sort = 'id';
    public $direction = 'desc';

    public $forSave;


    protected $rules = [
        'producto2.title' => 'required',
        'producto2.descripcion' => 'required',
        'producto2.precio' => 'required',
        'producto2.stock' => 'required',
        'producto2.categoria' => 'required',
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
        $this->producto2 = Producto::all();
    }
    public function updatingSearch(){
        $this->resetPage();
    }
    public function editar(Producto $p){
        $this->producto2 = $p->toArray(); #para mostrar en la vista
        $this->producto = $p; #para guardar el modelo en la base de datos
        $this->open = true;
    }
    public function guardar(){
        $this->producto->update($this->producto2);
        $this->validate();
        $this->producto->save();
        $this->reset(['open']);
    }


}
