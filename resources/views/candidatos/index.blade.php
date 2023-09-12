<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Candidatos Vacante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">                 
                  <h1 class="text-2xl font-bold text-center mb-10">Candidatos de la vacante: {{$vacante->titulo}}</h1>
                  @forelse ($vacante->candidatos as $candidato)
                    <li class="p-3 flex items-center">
                        <div class="flex-1">
                          <p class="text-xl text-gray-800 font-medium ">
                            {{$candidato->user->name}}
                          </p>
                          <p class="text-xl text-gray-800 ">
                            {{$candidato->user->email}}
                          </p>

                          <p class="text-xl text-gray-800 font-medium ">
                            Se Postulo :  <span class="font-normal">{{$candidato->user->created_at->diffForHumans()}}</span>
                          </p>                          
                        </div>
                        <div>
                            <a href="{{asset('/storage/cv/'.$candidato->cv)}}" class="
                                inline-flex items-center shadow-sm px-2.5 py-0 .5 border border-gray-300
                                text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50 " target="_blank"
                                rel="noreferrer noopener"
                                >
                                Ver C.V
                            </a>
                        </div>
                    </li>
                  @empty    
                      <p class="p-3 text-center text-gray-600 text-sm">No tiene candidatos</p>
                  @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
