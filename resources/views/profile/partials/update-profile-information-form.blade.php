<section class="mt-6 space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Informacion de usuarios servicio agua potable
        </h2>

       
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('cliente.create') }}" class="mt-6 space-y-6">
        @csrf
        @method('post')

         {{-- 
        <div>
           <x-input-label for="name" :value="__('Name')" />
           <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        --}}
             
        {{-- <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">@</span>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
          </div> --}}


        {{-- <div class="mt-6">
            <label for="nombre">Nombre:</label><br>
            <input type="text" class='form-control' id="nombre" name="nombre" required>
        </div>         
        
        <div>
            <label for="apellido">Apellido:</label>
            <input type="text" class='border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full' id="apellido" name="apellido" required>
        </div>

        <div>
            <label for="dpi">No. DPI:</label>
            <input type="text" class='border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full' id="dpi" name="dpi" required>
        </div>

        <div>
            <label for="telefono">No. telefono:</label>
            <input type="text" class='border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full' id="telefono" name="telefono" required>
        </div>

        <div>
            <label for="direccion">Direccion:</label>
            <input type="text" class='border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full' id="direccion" name="direccion" required>
        </div>

        <div>
            <label for="observacion">Observaciones:</label>
            <input type="text" class='border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full' id="observacion" name="observacion" required>
        </div> --}}


        {{-- 
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
--}}
        {{-- <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Guardar') }}</x-primary-button>

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
</section> --}} 
