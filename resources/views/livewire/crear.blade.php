<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:aling-middle sm:h-screen"></span>
            <div class="inline-block aling-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:aling-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <form method="POST">
                    @csrf
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">                       
                        {{--  Input del código  --}}
                        <div class="mb-4">
                            <label for="codigo" class="block text-gray-700 text-sm font-bold mb-2"> Código: </label>
                            <input type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="codigo"  name="codigo" wire:model="codigo" required min="13" max="13">
                            @error('codigo')
                                <p class="form-text text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        {{--  Input del precio  --}}
                        <div class="mb-4">
                            <label for="precio" class="block text-gray-700 text-sm font-bold mb-2"> Precio: </label>
                            <input type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="precio"  name="precio" wire:model="precio" required step="any" min="0.01">
                            @error('precio')
                                <p class="form-text text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        {{--  Input del marca --}}
                        <div class="mb-4">
                            <label for="marca" class="block text-gray-700 text-sm font-bold mb-2"> Marca: </label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="marca"  name="marca" wire:model="marca" required minlength="1" placeholder="Nautica">
                            @error('marca')
                                <p class="form-text text-danger">{{ $message }}</p>
                            @enderror                             
                        </div>
                         {{--  Input del color --}}
                         <div class="mb-4">
                            <label for="color" class="block text-gray-700 text-sm font-bold mb-2">Color:</label>
                            <div class="flex justify-start">
                                <div class="mb-3 xl:w-96">
                                    <select class="form-select block w-full px-3 py-1.5 m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example" id="color" wire:model="color" required>
                                        <option value="" selected disabled>Selecciona el color del producto</option>
                                        <option value="Rojo">Rojo</option>
                                        <option value="Azul">Azul</option>
                                        <option value="Negro">Negro</option>
                                        <option value="Amarillo">Amarillo</option>
                                        <option value="Verde">Verde</option>
                                        <option value="Blanco">Blanco</option>
                                        <option value="Morado">Morado</option>                                      
                                        <option value="Gris">Gris</option>
                                        <option value="Naranja">Naranja</option>
                                        <option value="Cafe">Cafe</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                    @error('color')
                                        <p class="form-text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                              </div>
                        </div>
                        {{--  Input del cantidad  --}}
                        <div class="mb-4">
                            <label for="cantidad" class="block text-gray-700 text-sm font-bold mb-2"> Cantidad: </label>
                            <input type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="cantidad" name="cantidad" wire:model="cantidad" min="0" required>
                            @error('cantidad')
                                <p class="form-text text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        {{--  Input del tipo  --}}
                        <div class="mb-4">
                            <label for="tipo" class="block text-gray-700 text-sm font-bold mb-2">Tipo:</label>
                            <div class="flex justify-start">
                                <div class="mb-3 xl:w-96">
                                    <select class="form-select block w-full px-3 py-1.5 m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example" id="tipo" wire:model="tipo">
                                        <option value="" selected disabled>Selecciona un tipo de producto</option>
                                        <option value="Camisa">Camisa</option>
                                        <option value="Pantalon">Pantalon</option>
                                        <option value="Tenis">Tenis</option>
                                        <option value="Sueter">Sueter</option>
                                        <option value="Chamarra">Chamarra</option>
                                        <option value="Short">Short</option>
                                        <option value="Fajo">Fajo</option>                                      
                                        <option value="Perfume">Perfume</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                    @error('tipo')
                                        <p class="form-text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                              </div>
                        </div>
                        {{--  Input del descripción  --}}
                        <div class="mb-4">
                            <label for="descripcion" class="block text-gray-700 text-sm font-bold mb-2">Descripción:</label>
                            <textarea type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="descripcion" wire:model="descripcion"></textarea>
                            @error('descripcion')
                                <p class="form-text text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        {{--  Botones  --}}
                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse">
                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                <button wire:click.prevent="guardar()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-cyan-600 focus:outline-none focus:border-black focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5 text-white"> Guardar</button>
                            </span>

                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                <button wire:click.prevent="cerrarModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-gray-500 focus:outline-none focus:border-black focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5 text-white"> Cancelar </button>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
    </div>
</div>

