
    <form class="md:w-1/2 space-y-5" wire:submit.prevent='editarVacante'>

        <div>
            <x-input-label for="titulo" :value="__('Titulo de la vacante')" />
            {{-- manera de recuperar los datos con la validacion --}}
            <x-text-input placeholder="Titulo vacante" id="titulo" class="block mt-1 w-full" type="text"
                wire:model="titulo" :value="old('titulo')" />
        </div>
        {{-- mostramos nuestros mensajes de validaciones con livewire --}}
        @error('titulo')
            {{-- manera de pasarle datos dinamicos a nuestros componentes de livewire --}}
            <livewire:mostrar-alerta :message="$message">
            @enderror
            <div>
                <x-input-label for="salario" :value="__('Salario mensual')" />
                <select wire:model="salario" id="salario"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                    <option value=""> --Selecciona un salario -- </option>
                    @foreach ($salarios as $salario)
                        <option value="{{ $salario->id }}">{{ $salario->salario }}</option>
                    @endforeach
                </select>
                @error('salario')
                    <livewire:mostrar-alerta :message="$message">
                    @enderror
            </div>
    
            <div>
                <x-input-label for="categoria" :value="__('Categoria')" />
                <select wire:model="categoria" id="categoria"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                    <option value=""> --Selecciona una categoria -- </option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                    @endforeach
    
                </select>
                @error('categoria')
                <livewire:mostrar-alerta :message="$message">
                @enderror
            </div>
    
            <div>
                <x-input-label for="empresa" :value="__('Empresa')" />
                {{-- manera de recuperar los datos con la validacion --}}
                <x-text-input placeholder="Empresa Ej. Netfliz,_Uber,Didi" id="empresa" class="block mt-1 w-full"
                    type="text" wire:model="empresa" :value="old('empresa')" />
                    @error('empresa')
                    <livewire:mostrar-alerta :message="$message">
                    @enderror
            </div>
    
            <div>
                <x-input-label for="ultimo_dia" :value="__('Ultimo día para postularse')" />
                {{-- manera de recuperar los datos con la validacion --}}
                <x-text-input placeholder="Empresa Ej. Netfliz,_Uber,Didi" id="ultima_dia" class="block mt-1 w-full"
                    type="date" wire:model="ultimo_dia" :value="old('ultimo_dia')" />
                    @error('ultimo_dia')
                    <livewire:mostrar-alerta :message="$message">
                    @enderror
            </div>
    
            <div>
                <x-input-label for="descripcion" :value="__('Descripcion Puesto')" />
                {{-- manera de recuperar los datos con la validacion --}}
                <textarea wire:model="descripcion" placeholder="Descripcion del puesto,experiencia."
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full h-72"
                    cols="30" rows="10"></textarea>
                    @error('descripcion')
                    <livewire:mostrar-alerta :message="$message">
                    @enderror
            </div>
    
            <div>
                {{-- aceppt/* para solo aceptar imagenes --}}
                <x-input-label for="imagen" :value="__('Imagen')" />
                <x-text-input id="imagen" class="block mt-1 w-full" type="file" wire:model="imagen_nueva" accept="image/*"/>
    
                {{-- imagen para editar --}}
                <div class="my-5 w-96">
                    <x-input-label for="imagen" :value="__('imagen ')" />
                    <img src="{{asset('storage/vacantes/'.$imagen)}}" alt="{{'imagen vacanet'.$titulo}}">
                </div>

                <div class="my-5 w-96">
                    
                    @if ($imagen_nueva)
                    Imagen nueva :
                        <img src="{{$imagen_nueva->temporaryUrl()}}" alt="">
                    @endif
                </div>  
    
                @error('imagen')
                <livewire:mostrar-alerta :message="$message">
                @enderror
            </div>
    
            <x-primary-button>
                Guardar cambios
            </x-primary-button>
    </form>

