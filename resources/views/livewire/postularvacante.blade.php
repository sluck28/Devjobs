<div class="bg-gray-100 p-5  mt-10  flex flex-col  justify-center items-center">
    <h3 class="text-center text-2xl font-bold  my-4">
        Postularme a la vacante
    </h3>

    @if (session()->has('mensaje'))
    <div class="uppercase border border-green-600  bg-green-100 text-green-600 font-bold p-2 my-5">
        {{session('mensaje')}}
    </div>
        
    @else
    {{-- metemos el formulario para que cuando la envie ya no se pueda postular --}}
    <form wire:submit.prevent='postularme' class="w-96 mt-5">
        <div class="mb-4">
            <x-input-label for="cv" :value="__('Curriculum o hoja de vida')" />
             <input wire:model="cv" type="file" accept=".pdf" class="block mt-1 w-full">

             <x-primary-button class="my-5">
                Postularme
            </x-primary-button>
            {{-- validamos con nuestro componente de alera de validacion 
                
                pasandole el mensaje--}}
            @error('cv')
                <livewire:mostrar-alerta :message="$message">
            @enderror
        </div>
       

    </form>
    @endif

</div>
