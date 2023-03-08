@php
    $classes = 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full';
@endphp

<form class='md:w-1/2 space-y-3' action="" method="post" wire:submit.prevent='crearVacante'>
    <!-- Email Address -->
    <div>
        <x-input-label for="titulo" :value="__('Titulo Vacante')" />
        <x-text-input id="titulo" class="block mt-1 w-full" type="text" wire:model.defer="titulo" :value="old('titulo')" placeholder="Titulo Vacante"/>
        @error('titulo')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

    <div>
        <x-input-label for="salario" :value="__('Salario Mensual')" />
        <select wire:model.defer="salario" id="salario" class="{{ $classes }}" >
            <option value="">-- Selecciona un Salario --</option>
           
            @foreach ($salarios as $salario)
                <option value="{{ $salario -> id }}">{{ $salario -> salario }}</option>
            @endforeach
        
        </select>
        @error('salario')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    
    </div>

    <div>
        <x-input-label for="categoria" :value="__('Categoría')" />
        <select wire:model.defer="categoria" id="categoria" class="{{ $classes }}" >
            <option value="">-- Selecciona una categoria --</option>
            
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria -> id }}">{{ $categoria -> categoria }}</option>
            @endforeach
        
        </select>
        @error('categoria')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    
    </div>

    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input id="empresa" class="block mt-1 w-full" type="text" wire:model.defer="empresa" :value="old('empresa')" placeholder="Empresa: ej. Netflix, Uber, Amazon, etc. "/>
        @error('empresa')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

    <div>
        <x-input-label for="ultimo_dia" :value="__('Último Día para Postularse')" />
        <x-text-input id="ultimo_dia" class="block mt-1 w-full" type="date" wire:model.defer="ultimo_dia" :value="old('ultimo_dia')"/>
        @error('ultimo_dia')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

    <div>
        <x-input-label for="descripcion" :value="__('Descripción Del Puesto')" />
        <textarea class="{{ $classes }}" 
         wire:model.defer="descripcion" id="descripcion" rows="7" placeholder="Descripcion general del puesto" ></textarea>
         @error('descripcion')
         <livewire:mostrar-alerta :message="$message"/>
     @enderror
    
    </div>

    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input id="imagen" class="block mt-1 w-full" type="file" wire:model="imagen" accept="image/*"/>

        <div class="my-5">
            @if ($imagen)
            Imagen:
            <img src="{{ $imagen -> temporaryUrl() }}" class="w-80 mx-auto">
                
            @endif
        </div>

        @error('imagen')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    
    </div>

   <div class="flex justify-end">
     <x-primary-button class="mt-5" >
         {{ __('Crear Vacante') }}
     </x-primary-button>
   </div>

</form>
