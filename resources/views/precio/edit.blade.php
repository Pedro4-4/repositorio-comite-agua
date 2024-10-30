<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
            {{-- {{ $persona }} --}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">




                    <section class="mt-6 space-y-6">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                Actualizacion de precios
                            </h2>
                    
                           
                        </header>
                    
                   
                    
                        <form method="POST" action="{{ route('precio.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('PATCH')
                    
                            <input type="hidden" name="id" value="{{ $precio->id }}">
                          
                            <div class="mt-6">
                                <label for="descripcion">Descripcion:</label><br>
                                <input type="text" class='form-control' value="{{ $precio->descripcion }}"  id="descripcion" name="descripcion" required>
                            </div>       
                            
                            <div class="mt-6">
                                <label for="monto">Monto:</label><br>
                                <input type="text" class='form-control' value="{{ $precio->monto }}"  id="monto" name="monto" required>
                            </div> 

                                              
                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Actualizar') }}</x-primary-button>
                    
                                @if (session('status') === 'profile-updated')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600"
                                    >{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
