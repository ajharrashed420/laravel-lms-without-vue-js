<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
      <body>
      <div class=" bg-white border-b border-gray-100 shadow-2">
        <div class="container mx-auto">
            <!--Header Section-->
            <header class="flex text-white h-16 justify-between items-center">
                <div class="flex items-center">
                    <a href="/" class="inline-block">
                      <img class="w-20" src="{{asset('/images/logo.png')}}" alt="Logo">
                    </a>
                    <nav class="hidden h-16 space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <a href="{{route('courses')}}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-base font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition">Courses</a>
                        <a href="courses.html" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-base font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition">Books</a>
                    </nav>
                </div>
        
                <!--Signup&login button-->
              <div class="flex items-center">
                   @if (Auth::check())
                      <p class="text-black">Welcome: {{ Auth::user()->name }}</p>
                       <a href="#" class="ml-8 inline-flex items-center justify-center rounded border border-transparent bg-black px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-500">Submit Course</a>
                      
                      @if (Auth::user()->type === 1)
                        <a href="{{route('dashboard')}}" class="ml-8 inline-flex items-center justify-center rounded border border-transparent bg-black px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-500">Dashboard</a>
                      @endif

                      <!-- Logout button -->
                      <form method="POST" action="{{ route('logout') }}">
                          @csrf

                          <button class="mx-2  px-4 py-2 text-sm font-medium bg-red-500 rounded" type="submit">Logout</button>
                      </form>
                      <!-- Logout button end-->
                    
                   @else
                    <a href="{{route('login')}}" class="text-sm font-medium text-gray-500 hover:text-gray-900">Login</a>
                    <a href="{{route('register')}}" class="ml-8 inline-flex items-center justify-center rounded border border-transparent bg-black px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-500">Sign up</a>
                   @endif
                </div>
            </header>
        </div>
      </div>
              {{ $slot }}

      </div>

          <!--Email Subscribe section-->
          <div class="w-full bg-update bg-no-repeat bg-cover h-[400px] py-0">
            <div class="container px-8 w-full flex flex-row justify-between items-center gap-5 mx-auto h-full">
              <div class="max-w-[579px] w-full">
                <h2 class="heading-secondary"> Don’t miss any updates </h2>
                <p class="mt-3.5 text-base-primary"> We will be covering course reviews, comparison between the best courses, and will be sharing exclusive discounts with you on a monthly basis. </p>
                <div class="mt-6 md:mt-12 w-full flex flex-col sm:flex-row items-center gap-5">
                  <input wire:model="email" type="email" placeholder="Your email address" class="md:max-w-[385px] input-focus w-full h-14 bg-white border border-orange rounded-lg px-3.5 text-base-primary text-[#262626] placeholder:text-current outline-none" required="">
                  <button wire:click="subscribe" class="bg-white w-full sm:w-[135px] shrink-0 h-14 rounded-lg flex justify-center items-center border border-orange text-lg-primary font-medium text-orange-100 bg-button-hover hover:text-white transition-all duration-300"> Subscribe </button>
                </div>
              </div>
              <div class="justify-center">
                <img src="https://laravel-courses.com/img/letter.png" alt="letter" class="w-auto h-auto object-contain">
              </div>
            </div>
          </div> 

      <!--Forter Section-->
      <footer class="w-full bg-dark pt-[94px] relative">
        <img src="https://laravel-courses.com/img/footer-cure.png" alt="Stylish Design" class="w-auto h-auto object-contain absolute bottom-0 right-0 pointer-events-none z-10">
        <div class="container flex justify-between pb-[50px]">
          <div>
            <h2 class="text-lg-primary-2 text-white">Course by Series</h2>
            <ul class="mt-5">
              <li class="mb-2">
                <a href="{{route('archive', ['series', 'laravel'])}}" class="text-links text-gray-100 text-base before:text-gray-100">Laravel</a>
              </li>
              <li class="mb-2">
                <a href="{{route('archive', ['series', 'php'])}}" class="text-links text-gray-100 text-base before:text-gray-100">PHP</a>
              </li>
              <li class="mb-2">
                <a href="{{route('archive', ['series', 'livewire'])}}" class="text-links text-gray-100 text-base before:text-gray-100">Livewire</a>
              </li>
              <li class="mb-2">
                <a href="{{route('archive', ['series', 'vue-js'])}}" class="text-links text-gray-100 text-base before:text-gray-100">Vue.js</a>
              </li>
            </ul>
          </div>
          <div>
            <h2 class="text-lg-primary-2 text-white">Course by Duration</h2>
            <ul class="mt-5">
              <li class="mb-2">
                <a href="{{route('archive', ['duration', '1-5-hours'])}}" class="text-links text-gray-100 text-base before:text-gray-100">1-5 hours</a>
              </li>
              <li class="mb-2">
                <a href="{{route('archive', ['duration', '5-10-hours'])}}" class="text-links text-gray-100 text-base before:text-gray-100">5-10 hours</a>
              </li>
              <li class="mb-2">
                <a href="{{route('archive', ['duration', '10-plus-hours'])}}" class="text-links text-gray-100 text-base before:text-gray-100">10+ hours</a>
              </li>
            </ul>
          </div>
          <div>
            <h2 class="text-lg-primary-2 text-white">Course by Level</h2>
            <ul class="mt-5">
              <li class="mb-2">
                <a href="{{route('archive', ['level', 'beginner'])}}" class="text-links text-gray-100 text-base before:text-gray-100">Beginner</a>
              </li>
              <li class="mb-2">
                <a href="{{route('archive', ['level', 'intermediate'])}}" class="text-links text-gray-100 text-base before:text-gray-100">Intermediate</a>
              </li>
              <li class="mb-2">
                <a href="{{route('archive', ['level', 'advanced'])}}" class="text-links text-gray-100 text-base before:text-gray-100">Advanced</a>
              </li>
            </ul>
          </div>
          <div>
            <h2 class="text-lg-primary-2 text-white">Course by Platform</h2>
            <ul class="mt-5">
              <li class="mb-2">
                <a href="{{route('archive', ['platform', 'laracasts'])}}" class="text-links text-gray-100 text-base before:text-gray-100">Laracasts</a>
              </li>
              <li class="mb-2">
                <a href="{{route('archive', ['platform', 'laravel-daily'])}}" class="text-links text-gray-100 text-base before:text-gray-100">Laravel Daily</a>
              </li>
              <li class="mb-2">
                <a href="{{route('archive', ['platform', 'codecourse'])}}" class="text-links text-gray-100 text-base before:text-gray-100">Codecourse</a>
              </li>
            </ul>
          </div>
          <div>
            <h2 class="text-lg-primary-2 text-white">Course by Topics</h2>
            <ul class="mt-5">
              <li class="mb-2">
                <a href="{{route('archive', ['topic', 'eloquent'])}}" class="text-links text-gray-100 text-base before:text-gray-100">Eloquent</a>
              </li>
              <li class="mb-2">
                <a href="{{route('archive', ['topic', 'validation'])}}" class="text-links text-gray-100 text-base before:text-gray-100">Validation</a>
              </li>
              <li class="mb-2">
                <a href="{{route('archive', ['topic', 'refactoring'])}}" class="text-links text-gray-100 text-base before:text-gray-100">Refactoring</a>
              </li>
              <li class="mb-2">
                <a href="{{route('archive', ['topic', 'testing'])}}" class="text-links text-gray-100 text-base before:text-gray-100">Testing</a>
              </li>
            </ul>
          </div>
        </div>



        
        <!--footer bottom -->
        <div class="mx-auto container flex items-center justify-between gap-5 pb-8">
          <ul class="items-center gap-3 z-50 relative">
            <li>
              <a href="#" target="_blank">
                <svg class="hover:filter hover:brightness-200" xmlns="http://www.w3.org/2000/svg" width="15" height="12" fill="none">
                  <path fill="#898F92" d="M15 1.412a6.217 6.217 0 0 1-1.764.487 3.043 3.043 0 0 0 1.348-1.68c-.595.353-1.255.6-1.95.741C12.067.353 11.27 0 10.368 0 8.683 0 7.306 1.355 7.306 3.028c0 .24.03.473.08.692A8.79 8.79 0 0 1 1.045.558a2.96 2.96 0 0 0-.415 1.517c0 1.052.538 1.984 1.37 2.513a3.08 3.08 0 0 1-1.399-.353v.021c0 1.469 1.061 2.697 2.467 2.972a3.072 3.072 0 0 1-1.384.05 3.023 3.023 0 0 0 1.09 1.505 3.1 3.1 0 0 0 1.778.598A6.171 6.171 0 0 1 .731 10.68c-.243 0-.487-.014-.731-.042A8.808 8.808 0 0 0 4.718 12c5.65 0 8.755-4.616 8.755-8.619 0-.134 0-.261-.007-.395A6.094 6.094 0 0 0 15 1.412Z"></path>
                </svg>
              </a>
            </li>
          </ul>
          <p class="text-sm  text-center text-[#E5E5E580] leading-5 z-50 relative"> Developed by <a href="https://twitter.com/phpfour" target="_blank" class="hover:underline font-medium">Mohammad Emran ⚡️</a></p>
          <span></span>
        </div>
      </footer>
  </body>
</html>