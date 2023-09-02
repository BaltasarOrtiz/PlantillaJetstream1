<div>
    @if($producto != Null)
        <x-dialog-modal wire:model='open'>
            <x-slot name='title'>
                <p class="text-yellow-200">${{$producto->precio}}</p>
            </x-slot>
            <x-slot name='content'>
                <div class="w-full rounded overflow-hidden shadow-lg">
                    <img class="w-full" alt="No image" src="{{Storage::url($producto->image)}}">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">
                            {{$producto->title}}
                        </div>
                        <p class="text-white text-base">
                            {{$producto->descripcion}}
                        </p>
                        <div>
                            <span class="inline-block text-black bg-gray-200 rounded-full px-3 my-4 py-1 text-sm font-semibold">{{$producto->categoria}}</span>
                        </div>
                    </div>
                </div>
            </x-slot>
            <x-slot name='footer'>
                <x-danger-button class="mx-2" wire:click="$set('open',false)">
                    Cancelar
                </x-danger-button>
                <x-button wire:loading.attr='disable' class='disable:opacity-25'>
                    Añadir al Carrito
                </x-button>
            </x-slot>
        </x-dialog-modal>

        <div class="px-4">
            <x-input class="flex-1 mx-auto my-4 w-full" placeholder="Buscar..." type="text"
            wire:model.live='search'/>
        </div>
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-10 lg:max-w-7xl lg:px-8">
            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:-grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                @foreach ($productos as $item)
                    <div class="group">
                        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                            <img src="{{Storage::url($item->image)}}" alt="no image" class="h-full w-full object-cover object-center group-hover:opacity-75">
                        </div>
                        <h3 class="mt-4 text-sm text-white">{{$item->title}}</h3>
                        <p class="mt-1 text-lg font-medium text-yellow-200">${{$item->precio}}</p>
                        <x-button class="w-full text-center justify-center" wire:click="mostrarProducto({{$item}})">
                            Vista Previa
                        </x-button>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="px-6 py-3">
            {{$productos->links()}}
        </div>
    @else
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">No products in database....</span>
        </div>
    @endif

</div>
