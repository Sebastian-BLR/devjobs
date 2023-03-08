<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-3xl font-bold text-center my-5">Mis Notificaciones</h1>
                  
                    @forelse ($notificaciones as $notificacion)
                      <div class="md:flex md:justify-between md:items-center p-5 border border-gray-200 dark:border-gray-700">
                        <div>
                            <p>Tienes un nuevo candidato en:
                                <span class="font-bold">{{ $notificacion -> data['nombre_vacante'] }}</span>
                            </p>
                            
                            <p>Hace:
                                <span class="font-bold">{{ str_replace('hace','',$notificacion -> created_at -> diffForHumans(null,false,false,2)  )}}</span>
                            </p>
                        </div>
                      
                    
                        <div class="mt-5 md:mt-0 flex justify-end">
                            <a href="{{ route('candidatos.index', $notificacion->data['id_vacante']) }}" class = "bg-indigo-500  py-2 px-4 rounded-lg text-white  text-xs font-bold uppercase">Ver Candidatos</a>
                        </div>
                    
                    </div>
                      
                  @empty
                      <p class="text-center text-gray-500">Sin Notificaciones Nuevas</p>
                  @endforelse
                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
