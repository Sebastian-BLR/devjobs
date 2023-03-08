
    <div class="">


        <livewire:filtrar-vacantes />

        <div class="max-w-7xl mx-auto sm:px-6 px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    <h3 class="font-extrabold text-4xl text-center mb-8">Nuestras Vacantes Disponibles</h3>
                    <div class="bg-white dark:bg-slate-600 dark:shadow-gray-700  shadow-lg rounded-lg p-6  divide-y divide-gray-200 dark:divide-gray-700 ">
                        @forelse ($vacantes as $vacante )
                            @php
                                $fecha = $vacante -> ultimo_dia;
                                $fin = $fecha->addDay()->diffForHumans(['parts' => 3]); 
                                $palabras = ['en','hace'];
                                $palabras_remplazo =['Finaliza en', 'Finalizó hace'];
                            @endphp

                            <div class="md:flex md:justify-between md:items-center py-5">
                                <div class="flex-1">
                                    <a href="{{ route('vacantes.show', $vacante -> id) }}"
                                        class="text-3xl font-extrabold text-gray-600 dark:text-gray-200">{{ $vacante -> titulo }}</a>
                                        <p class="text-base text-gray-500 dark:text-gray-300 ">{{ $vacante -> empresa }}</p>
                                        <p class="text-base text-gray-500 dark:text-gray-300 ">{{ $vacante -> categoria -> categoria }}</p>
                                        <p class="text-base text-gray-500 dark:text-gray-300 ">{{ $vacante -> salario   -> salario }}</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400 font-bold">Último día: {{$fecha->format('d/m/Y') }}</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400 font-bold">{{ str_replace($palabras,$palabras_remplazo,$fin) }}</p>
                                    </div>

                                <div class="mt-5 md:mt-0">
                                    <a href="{{ route('vacantes.show', $vacante -> id) }}"
                                        class="bg-indigo-500  py-2 px-4 rounded-lg text-white  text-xs font-bold uppercase block text-center">Ver Vacantie</a>
                                </div>
                            </div>
                        @empty
                            <p class="p-3 text-center text-sm text-gray-500 dark:text-gray-300">Sin Vacantes por el momento</p>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>

