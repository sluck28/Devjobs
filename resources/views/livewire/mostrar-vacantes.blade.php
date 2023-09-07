<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">        
            {{-- mostramos nuestra vacante con un foreach --}}
            @forelse ($vacantes as $vacante)
                <div class="p-6 text-gray-900 border-b  border-gray-200 md:flex md:justify-between">
                    {{-- {{ __("Mostrar vacantes") }} --}}
                    <div class="space-y-3">
                        <a href="#" class="text-xl font-bold">
                            {{ $vacante->titulo }}
                        </a>
                        <p class="text-sm text-gray-600 font-bold">{{ $vacante->empresa }}</p>
                        {{-- hacer formato de fecha --}}
                        <p class="text-sm text-gray-500">ultimo día :{{ $vacante->ultimo_dia->format('d/m/Y') }}</p>

                    </div>

                    <div class="flex gap-3 items-center mt-5 md:mt-0">
                        <a href="#"
                            class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">
                            Candidatos
                        </a>

                        <a href="{{route('vacantes.edit',$vacante->id)}}"
                            class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                            </svg>

                        </a>

                        <a href="#"
                            class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>

                        </a>
                    </div>
                </div>

    </div>
@empty
    <p class="p-3 text-center">No hay vacantes que mostrar</p>
    @endforelse
</div>

<div class=" mt-10">
    {{$vacantes->links()}}
</div>