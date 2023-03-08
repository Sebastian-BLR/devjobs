<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        @forelse($vacantes as $vacante)    
        <div class="p-6 text-gray-900 dark:text-gray-100 md:flex justify-between items-center">
         <div class="space-y-2">
            
            <a href="{{ route('vacantes.show', $vacante) }}" class="text-xl font-bold ">
                {{ $vacante -> titulo }}
            </a>
            
            <p class="text-sm text-gray-600 dark:text-gray-400 font-bold" >{{ $vacante -> empresa }}</p>
    
            <p class="text-sm text-gray-500  font-bold">Último día: {{$vacante -> ultimo_dia->format('d/m/Y') }}</p>
            <p class="text-sm text-gray-500  font-bold">
                @php
                $fin = $vacante -> ultimo_dia->addDay()->diffForHumans(['parts' => 3]); 
                $palabras = ['en','hace'];
                $palabras_remplazo =['Finaliza en', 'Finalizó hace']
                 @endphp
                {{ str_replace($palabras,$palabras_remplazo,$fin) }}</p>
         </div>
    
        <div class="flex gap-3 items-center mt-2 md:mt-0 justify-between">
            @php
                $num_candidatos = $vacante -> candidatos -> count();
            @endphp
            <a href="{{ route('candidatos.index' , $vacante) }}" class="bg-slate-700 dark:bg-slate-500 py-2 px-4 rounded-lg text-white dark:text-gray-200 text-xs font-bold uppercase relative">Candidatos <span class="bg-indigo-500 px-1 rounded-full  absolute -right-1 -top-1  {{ $num_candidatos ?: 'hidden'}}">{{ $num_candidatos }}</span></a>
            
            <a href="{{ route('vacantes.edit', $vacante -> id) }}" class="bg-blue-700 dark:bg-blue-600 py-2 px-4 rounded-lg text-white dark:text-gray-200 text-xs font-bold uppercase">Editar</a>
            
            <button class="bg-red-500  py-2 px-4 rounded-lg text-white dark:text-gray-200 text-xs font-bold uppercase"
                    wire:click="$emit('mostrarAlerta', {{ $vacante -> id }})">Eliminar</button>
       
        </div>
        </div>
        @empty
            <p class="p-6 text-gray-900 dark:text-gray-100 text-center text-xl md:text-2xl">No hay vacantes</p>
        @endforelse   
    </div>
    
    @if(count($vacantes))
    <div class="mt-10">{{ $vacantes -> links() }}</div>
    @endif
    
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Livewire.on('mostrarAlerta', vacanteId =>{
        Swal.fire({
            title: '¿Eliminar la vacante?',
            text: "Una vacante eliminada no se puede recuperar",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, ¡Eliminar!',
            cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.isConfirmed) {
            // eliminar la vacante
            Livewire.emit('eliminarVacante', vacanteId)
            
            Swal.fire(
            '¡Eliminada!',
            'Vacante eliminada.',
            'success'
            )
        }
    })
    });
  
</script>
@endpush