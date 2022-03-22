<x-slot name="header">
    <h1 class="text-gray-900"> CRUD Productos </h1>
</x-slot>    
<div class="py-12">
    <div class="max-w-7x1 mx-auto sm:px6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">        
            {{--  Crear boton para un ir al formulario  --}}
            <button wire:click="crear()" class="bg-green-400 hover:bg-green-600 text-white font-bold py-2 px-4 my-3">Nuevo</button>            
            @if ($modal)
                @include('livewire.crear') 
            @endif                                                 
            <table class="table-fixed w-full">
                <thead>
                  <tr class="bg-indigo-600 text-white">
                    <th class="px-4 py-2">Id</th>                    
                    <th class="px-4 py-2">Código</th>
                    <th class="px-4 py-2">Precio</th>
                    <th class="px-4 py-2">Marca</th>
                    <th class="px-4 py-2">Color</th>
                    <th class="px-4 py-2">Cantidad</th>
                    <th class="px-4 py-2">Tipo</th>
                    <th class="px-4 py-2">Descripción</th>
                    <th class="px-4 py-2">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td class="border px-4 py-2"> {{ $producto->id }} </td>                            
                            <td class="border px-4 py-2"> {{ $producto->codigo }} </td>
                            <td class="border px-4 py-2"> {{ $producto->precio }} </td>
                            <td class="border px-4 py-2"> {{ $producto->marca }} </td>
                            <td class="border px-4 py-2"> {{ $producto->color }} </td>
                            <td class="border px-4 py-2"> {{ $producto->cantidad }} </td>
                            <td class="border px-4 py-2"> {{ $producto->tipo }} </td>
                            <td class="border px-4 py-2"> {{ $producto->descripcion }} </td>
                            <td class="border px-4 py-2 text-center">
                                <button wire:click="editar({{$producto->id}})" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6"> Editar </button>
                                <button wire:click="eliminar({{$producto->id}})" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4"> Eliminar </button>
                            </td>
                        </tr> 
                    @endforeach                 
                </tbody>
              </table>
        </div>
    </div>    
</div>   