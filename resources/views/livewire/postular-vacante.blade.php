<div class="bg-gray-100 dark:bg-gray-900 rounded-lg p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">Postularme a esta vacante</h3>

    @if (session()->has('mensaje'))
    <p class="uppercase border border-green-600 dark:border-green-200 bg-green-100 dark:bg-green-700 text-green-600 dark:text-green-200 font-bold p-2 my-2 ">{{ session('mensaje') }}</p>
    
    @else
    <form wire:submit.prevent='postularme' class="md:w-80 mt-3 " action="" method="post">
        
        <div class="mb-5">
            <x-input-label for="cv"  :value="__('Curriculum o Hoja de vida (PDF)')" />
            <x-text-input  id="cv" type="file" accept=".pdf" class="block mt-2 w-full"  wire:model="cv" />
            
        </div>

        @error('cv')
            <div class="mb-5">
                <livewire:mostrar-alerta :message="$message" />                
            </div>
        @enderror

<div class="mb-5 flex justify-end w-full">
    <x-primary-button >{{ __('Postularme') }}</x-primary-button>
</div>

    </form>

    @endif
</div>
