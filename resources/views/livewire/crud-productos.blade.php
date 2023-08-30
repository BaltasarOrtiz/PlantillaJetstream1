<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Productos') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="px-4">
                    <x-input class="flex-1 mx-auto my-4 w-full" placeholder="Buscar..." type="text"
                    wire:model.live='search'/>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <x-tabla>
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th wire:click="ordenar('id')" scope="col" class="px-6 py-3 cursor-pointer">
                                    ID
                                </th>
                                <th wire:click="ordenar('title')" scope="col" class="px-6 py-3 cursor-pointer hover:">
                                    NOMBRE
                                </th>
                                <th wire:click="ordenar('descripcion')" scope="col" class="px-6 py-3 cursor-pointer hover:">
                                    DESCRIPCION
                                </th>
                                <th wire:click="ordenar('categoria')" scope="col" class="px-6 py-3 cursor-pointer hover:">
                                    CATEGORIA
                                </th>
                                <th wire:click="ordenar('stock')" scope="col" class="px-6 py-3 cursor-pointer hover:">
                                    STOCK
                                </th>
                                <th wire:click="ordenar('precio')" scope="col" class="px-6 py-3 cursor-pointer hover:">
                                    PRECIO
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    ACCIONES
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                    {{$item->id}}
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$item->title}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$item->descripcion}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$item->categoria}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$item->stock}}
                                </td>
                                <td class="px-6 py-4">
                                    ${{$item->precio}}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" wire:click="editar({{$item}})">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </x-tabla>
                    <div class="px-6 py-3">
                        {{$productos->links()}}
                    </div>
                </div>
            </div>
        </div>
        <x-dialog-modal wire:model='open'>
            <x-slot name="title">
            </x-slot>
            <x-slot name="content">
                <div class="mb-4">
                    <x-label value="Nombre del Producto" />
                    <x-input wire:model.live="producto.title" type="text" class="w-full"/>
                    <x-input-error for="producto.title"/>
                </div>
                <div class="mb-4">
                    <x-label value="Precio del Producto"/>
                    <x-input wire:model.live="producto.precio" type="text" class="w-full"/>
                    <x-input-error for="producto.precio"/>
                </div>
                <div class="mb-4">
                    <x-label value="Stock"/>
                    <x-input wire:model.live="producto.stock" type="text" class="w-full"/>
                    <x-input-error for="producto.stock"/>
                </div>
                <div class="mb-4">
                    <x-label value="Descripcion del Producto"/>
                    <textarea wire:model.live="producto.descripcion" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" cols="30" rows="10"></textarea>
                    <x-input-error for="producto.descripcion"/>
                </div>
                <div class="mb-4">
                    <x-label value="Categoria del Producto"/>
                    <x-input wire:model.live="producto.categoria" type="text" class="w-full"/>
                    <x-input-error for="producto.categoria"/>
                </div>

            </x-slot>
            <x-slot name='footer'>
                <x-danger-button class="mx-2" wire:click="guardar()">
                    Guardar
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>
    </x-app-layout>
</div>
