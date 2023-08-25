<x-guest-layout>
    <div class="min-h-screen bg-slate-400  flex flex-col sm:justify-center items-center pt-6 sm:pt-0 ">



        <!--  SOCIAL LOGIN --->



        <div id="social_login" class=" mt-6 w-96">
            <h1 class="text-center mb-0 text-2xl">
                SOCIAL LOGIN
            </h1>

            <div class="inline-flex items-center justify-center w-full">
                <hr class="w-full h-px my-2 bg-gray-700 border-0 dark:bg-gray-200">
            </div>

            <div class="text-white">
            
            <a href="{{ route('social.redirect',['provider' => 'linkedin']) }}"
                class="btn   btn-ghost  bg-[#0e76a8] btn-lg btn-block mt-2 ">
                <svg width="32" height="32" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                    stroke="currentColor">
                    <path
                        d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z">
                    </path>
                </svg>
                <span>&nbsp;Login with Linkedin </span>


            </a>

            <a href="{{ route('social.redirect',['provider' => 'google']) }}"
                class="btn btn-ghost bg-[#db4a39]  btn-lg btn-block mt-2 ">
                <svg width="32" height="32" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
                    <path
                        d="M 25.996094 48 C 13.3125 48 2.992188 37.683594 2.992188 25 C 2.992188 12.316406 13.3125 2 25.996094 2 C 31.742188 2 37.242188 4.128906 41.488281 7.996094 L 42.261719 8.703125 L 34.675781 16.289063 L 33.972656 15.6875 C 31.746094 13.78125 28.914063 12.730469 25.996094 12.730469 C 19.230469 12.730469 13.722656 18.234375 13.722656 25 C 13.722656 31.765625 19.230469 37.269531 25.996094 37.269531 C 30.875 37.269531 34.730469 34.777344 36.546875 30.53125 L 24.996094 30.53125 L 24.996094 20.175781 L 47.546875 20.207031 L 47.714844 21 C 48.890625 26.582031 47.949219 34.792969 43.183594 40.667969 C 39.238281 45.53125 33.457031 48 25.996094 48 Z" />
                </svg>
                <span class='ml-4'>&nbsp;Login with Google</span>
            </a>

            <a href="{{ route('social.redirect',['provider' => 'twitter']) }}"
                class="btn btn-ghost  bg-[#404040] btn-lg btn-block mt-2">
                <svg width="32" height="32" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><g transform="translate(-71.09-24.1)"><path d="m53.11 31.25l-.004-3.901 4.375-.652v4.553h-4.371m5.1-4.669l5.832-.931v5.6h-5.832v-4.669m5.833 5.469l-.0001 5.6-5.832-.9v-4.7h5.833m-6.562 4.598l-4.371-.657v-3.941h4.372v4.598" transform="translate(20.507.462)" /></g></svg>
                <span class='ml-4'>&nbsp;Login with Microsoft</span>
             

            </a>
            </div>

            <div class="inline-flex items-center justify-center w-full">
                <hr class="w-full h-px my-4 bg-gray-700 border-0 dark:bg-gray-200">
            </div>

            <div class=" mt-4  w-80  bg-yellow-200 text-center">
                @if(session('status'))
                    <div class=" h-8 flex items-center justify-center font-medium  text-md  text-amber-700 dark:text-amber-400">
                      <p >
                        {{ session('status') }} - {{ session('message') }}
                        </p>
                    </div>
                @endif
            </div>

        </div>
        <!--  SOCIAL LOGIN --->

    </div>

</x-guest-layout>
