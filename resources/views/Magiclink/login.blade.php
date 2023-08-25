<x-guest-layout>

 <div class="min-h-screen bg-slate-400  flex flex-col sm:justify-center items-center pt-6 sm:pt-0 ">


 <div id="social_login" class=" mt-6 w-2/6 p-2 rounded-lg bg-gray-200">



       
            <h1 class="text-center  text-xl mb-2 font-bold">
               Obtenga su Magic-Link para iniciar sesión 
               
            </h1>
            <p class="text-justify text-xs mb-6 px-4"> 
                 La aplicación enviará un enlace único a tu dirección de correo electrónico. Al hacer clic en el enlace, 
                 serás redirigido al sitio web  y podrás iniciar sesión sin tener que ingresar una contraseña.
            <p> 
           <x-validation-errors class="mb-4" />

            <x-banner class="mb-4"/>

             <form class="px-2 mt-2" method="POST" action="{{ route('login.send.magiclink') }} ">
                @csrf

                <div>
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <button type='submit' class="btn btn-primary mt-4 w-full text-center">
                    {{'Send my magic link OTP' }}
                <button>

  
            </form>
            


</div>
</div>

</x-guest-layout>
