<div class=" md:px-10 py-5 ">
    <div class="mb-5">
        <div class="mb-5">
            <h3 class="font-bold text-3xl text-gray-800 dark:text-gray-300 text-center ">{{ $vacante -> titulo }}</h3>
        </div>
    
        <div class="md:grid grid-cols-2 gap-3 bg-gray-50 dark:bg-gray-900 rounded-lg p-5">
            <p class="font-bold text-md uppercase text-gray-800 dark:text-gray-300 ">
                Empresa: <span class="normal-case font-normal">{{ $vacante -> empresa }}</span>
            </p>
            
               
            
            <p class="font-bold text-md uppercase text-gray-800 dark:text-gray-300 ">
                Categoría: <span class="normal-case font-normal">{{ $vacante -> categoria -> categoria }}</span>
            </p>
        
            <p class="font-bold text-md uppercase text-gray-800 dark:text-gray-300 ">
                Salario: <span class="normal-case font-normal">{{ $vacante -> salario -> salario}}</span>
            </p>
       
            
            
                <p class="font-bold text-md uppercase text-gray-800 dark:text-gray-300 ">
                    Ultimo día: <span class="normal-case font-normal">{{ $vacante -> ultimo_dia -> toFormattedDateString() }}</span>
                </p>
        
                <p class="font-bold text-md uppercase text-gray-800 dark:text-gray-300 ">
                    Finaliza en: <span class="normal-case font-normal">{{ str_replace('en','',$vacante -> ultimo_dia->addDay()->diffForHumans(null,false,false, 2)) }}</span>
                </p>
        </div>
    </div>
    <div class="md:grid md:grid-cols-12 gap-5  ">
        <div class="col-span-5">
            <img  src="{{ asset("storage/vacantes/{$vacante -> imagen}") }}" alt="Imagen para vacante de {{ $vacante -> titulo }}">
        </div>
        
        <div class="col-span-7 bg-gray-50 dark:bg-gray-900 rounded-lg p-5 mt-5 md:mt-0">
            <h2 class="text-2xl font-bold mb-5">Descripcion del Puesto</h2>
            <p>{{ $vacante -> descripcion }}</p>
        </div>
    </div>
    
    @guest
    <div class="mt-5 bg-gray-50 dark:bg-gray-700  text-gray-900 dark:text-gray-200 dark:border-gray-800 border border-dashed p-5 text-center">
        <p>
            ¿Deseas aplicar a esta vacante?, <a class="font-bold text-indigo-600" href="{{ route('register') }}">Obten una cuenta</a>
        </p>
    </div>
    @endguest

    @auth
        
    @cannot('create', App\Model\Vacante::class)
    <livewire:postular-vacante :vacante="$vacante" /> 
    @endcannot
    
    @endauth
    
</div>
