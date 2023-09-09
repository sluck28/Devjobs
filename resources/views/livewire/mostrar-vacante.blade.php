<div class="p-10">
    <div class="mb-5 ">
        <h3 class="font-bold text-3xl text-gray-800 ">
            {{$vacante->titulo}}            
        </h3>

        <div class="md:grid md:grid-cols-2 bg-gray-50 p-4 my-10">
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Empresa: <span class="normal-case font-normal">{{$vacante->empresa}}</span></p>
                
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Ultimo dia para postularse: <span class="normal-case font-normal">{{$vacante->ultimo_dia->toFormattedDateString()}}</span></p>

            <p class="font-bold text-sm uppercase text-gray-800 my-3">Categoria: <span class="normal-case font-normal">{{$vacante->categoria->categoria}}</span></p>

            <p class="font-bold text-sm uppercase text-gray-800 my-3">Salario: <span class="normal-case font-normal">{{$vacante->salario->salario}}</span></p>


        </div>
    </div>

    <div class="md:grid md:grid-cols-6 gap-4">
        <div class="md:col-span-2">
            {{-- asi traemos nuestra imagen de la vacante --}}
            <img src="{{asset('storage/vacantes/'.$vacante->imagen)}}" alt="{{'Imagen vacante'.$vacante->titulo}}">
        </div>

        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold  mb-5">
                Descripcion del puesto
            </h2>
            <p>{{$vacante->descripcion}}</p>
        </div>

    </div>
    {{-- manera para mostrar si el usuario ya tiene una cuenta o no --}}
    <div class="mt-5 bg-gray50 border border-dashed p-5  text-center">

        

        @guest    
        <p>
            ¿Deseas aplicar a esta vacante ? <a class="font-bold text-indigo-600" href="{{route('register')}}">Obten una cuenta  y aplica  a esta y otras vacantes</a>
        </p>
        @endguest

        {{-- utilizamos cannot para los reclutadores que no pueden postulares en este caso traemos el nombre
            del policy de create --}}
        @cannot('create', App\Models\Vacante::class)
         {{-- componente solo para los que buscan empleos --}}
        <livewire:postularvacante :vacante="$vacante" />
        @endcannot
       
    </div>
</div>
