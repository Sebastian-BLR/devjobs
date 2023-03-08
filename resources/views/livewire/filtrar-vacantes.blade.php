<div class="bg-gray-100  mx-auto max-w-7xl dark:bg-gray-900 sm:px-6  px-8 py-8">
    
    <div class="dark:bg-gray-800 sm:rounded-lg p-6">
        <h2 class="text-2xl md:text-4xl text-gray-600 dark:text-gray-100 text-center font-extrabold my-5">Buscar y Filtrar Vacantes</h2>
    
        <div class="lg:p-8 ">
            <form wire:submit.prevent='leerDatosFormulario'>
                <div class="md:grid md:grid-cols-3 gap-5 max-w-7xl">
                    <div class="mb-5">
                        <label 
                            class="block mb-1 text-sm text-gray-700 dark:text-gray-300 uppercase font-bold"
                            for="termino">Término de Búsqueda
                        </label>
                        <input 
                            id="termino"
                            type="text"
                            placeholder="Buscar por Término: ej. Laravel"
                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                            wire:model.defer="termino"
                        />
                    </div>
    
                    <div class="mb-5">
                        <label class="block mb-1 text-sm text-gray-700 dark:text-gray-100 uppercase font-bold">Categoría</label>
                        <select wire:model.defer='categoria' class="border-gray-300 p-2 w-full">
                            <option value=''>--Seleccione--</option>
                
                            @foreach ($categorias as $categoria )
                                <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                            @endforeach
                        </select>
                    </div>
    
                    <div class="mb-5">
                        <label class="block mb-1 text-sm text-gray-700  dark:text-gray-100 uppercase font-bold">Salario Mensual</label>
                        <select wire:model.defer='salario' class="border-gray-300 p-2 w-full">
                            <option value=''>-- Seleccione --</option>
                            @foreach ($salarios as $salario)
                                <option value="{{ $salario->id }}">{{$salario->salario}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
    
                <div class="flex justify-end">
                    <input 
                        type="submit"
                        class="bg-indigo-500 hover:bg-indigo-600 transition-colors text-white text-sm font-bold px-10 py-2 rounded cursor-pointer uppercase w-full md:w-auto"
                        value="Buscar"
                    />
                </div>
            </form>
        </div>
    </div>
</div>