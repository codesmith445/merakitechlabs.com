
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5P7JTTH5B4"></script>
            <script>
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());
            
              gtag('config', 'G-5P7JTTH5B4');
            </script>
        <!-- Google tag (gtag.js) -->
        
        <!--Meta Tag For Google Adsense to display ads on website-->
        <meta name="google-adsense-account" content="ca-pub-4359151477574087">
        <!--End / Meta Tag For Google Adsense to display ads on website-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $metaTitle ?: 'merakitechlabs - your coding buddy' }}</title>
    <meta name="author" content="merakitechlabs">
    <meta name="description" content="{{ $metaDescription }}">
    <!-- Canonical Link -->
    <link rel="canonical" href="{{ url()->current() }}" />
    {!! OpenGraph::generate() !!}
        <script type="application/ld+json">
                {
                  "@context": "https://schema.org",
                  "@type": "WebSite",
                  "name": "merakitechlabs",
                  "url": "https://www.merakitechlabs.com",
                  "potentialAction": {
                    "@type": "SearchAction",
                    "target": "https://www.merakitechlabs.com/?s={search_term_string}",
                    "query-input": "required name=search_term_string"
                  }
                }
        </script>
    
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
    </style>
    
    <!-- Fancy Box link for Image zoom in zoom out in the $post->body  in the view.blade.php-->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"
    />
    <!--End Fancy Box link for Image zoom in zoom out in the $post->body  in the view.blade.php-->

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>

    <!-- Link for Code Highlighter -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>

    <!-- and it's easy to individually load additional languages -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/go.min.js"></script>

    <script>hljs.highlightAll();</script>
    <!-- End Link for Code Highlighter -->
    <link rel="canonical" href="{{ url()->current() }}" />
    @livewireStyles
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-70 font-family-karla">

    <!-- Top Bar Nav -->
    <!-- <nav class="w-full py-4 bg-blue-800 shadow">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between">

            <nav>
                <ul class="flex items-center justify-between font-bold text-sm text-white uppercase no-underline">
                    <li><a class="hover:text-gray-200 hover:underline px-4" href="#">Shop</a></li>
                    <li><a class="hover:text-gray-200 hover:underline px-4" href="#">About</a></li>
                </ul>
            </nav>

            <div class="flex items-center text-lg no-underline text-white pr-6">
                <a class="" href="#">
                    <i class="fab fa-facebook"></i>
                </a>
                <a class="pl-6" href="#">
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="pl-6" href="#">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="pl-6" href="#">
                    <i class="fab fa-linkedin"></i>
                </a>
            </div>
        </div>

    </nav> -->

    <!-- Text Header -->
    <header class="w-full container mx-auto">
        <div class="flex flex-col items-center py-12">
            <a class="font-bold text-gray-900 uppercase hover:text-gray-700 text-5xl" href="{{ route('home') }}">
                merakitechlabs
            </a>
            <p class="text-lg text-gray-600">
                {{ \App\Models\TextWidget::getTitle('header') }}
            </p>
        </div>
    </header>
    <!-- Top Nav -->
    <nav class="w-full py-3 bg-gray-900 sticky top-0 z-50" x-data="{ open: false }">
        <div class="block sm:hidden">
            <a
                href="#"
                class="block md:hidden text-base font-bold uppercase text-center flex justify-center items-center text-white"
                @click="open = !open"
            >
                Topics <i :class="open ? 'fa-chevron-down': 'fa-chevron-up'" class="fas ml-2"></i>
            </a>
        </div>
        <div :class="open ? 'block': 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
            <div class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-between text-sm font-bold uppercase mt-0 px-6 py-2">
                
                <!-- Categories Links -->
                <div>
                    @foreach($categories as $category)
                        <a href="{{ route('by-category', $category) }}" class="hover:bg-blue-600 text-white rounded py-2 px-4 mx-2">{{ $category->title }}</a>
                    @endforeach
                </div>
                
                <!-- Search Field -->
                <form class="max-w-md mx-auto my-2 sm:my-0" method="get" action="{{ route('search') }}">   
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="search" name="q" value="{{ request()->get('q') }}" id="default-search" class="block w-full p-2 pl-10 text-sm text-gray-300 border border-gray-700 rounded-lg bg-gray-800 placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white" placeholder="Search Something..." required />
                    </div>
                </form>
                
                <!-- Navigation Links and Auth Links -->
                <div class="flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0">
                    <a href="{{ route('home') }}" class="hover:bg-blue-600 text-white rounded py-2 px-4 mx-2">Home</a>
                    <a href="{{ route('about-us') }}" class="hover:bg-blue-600 text-white rounded py-2 px-4 mx-2">About Us</a>
                    
                    @auth
                    <div class="flex sm:items-center sm:ms-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="hover:bg-blue-600 flex item-center text-white rounded py-2 px-4 mx-2">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    @else
                        <a href="{{ route('login') }}" class="hover:bg-blue-600 text-white rounded py-2 px-4 mx-2">Login</a>
                        <a href="{{ route('register') }}" class="bg-blue-600 text-white rounded py-2 px-4 mx-2">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- End Top Nav -->

    <!-- Hero Section -->
    <div class="container flex flex-wrap mx-auto py-6">
        {{ $slot }}
    </div>
    <!-- End Hero Section -->

    <!-- <footer class="w-full border-t bg-white pb-12">
        <div class="w-full container mx-auto flex flex-col items-center">
            <div class="flex flex-col md:flex-row text-center md:text-left md:justify-between py-6">
                <a href="{{ route('about-us') }}" class="uppercase px-3">About Us</a>
                <a href="#" class="uppercase px-3">Privacy Policy</a>
                <a href="#" class="uppercase px-3">Terms & Conditions</a>
                <a href="#" class="uppercase px-3">Contact Us</a>
            </div>
            <div class="uppercase pb-6">&copy; merakitechlabs.com</div>
        </div>
    </footer> -->


    <!-- Footer New -->
    <footer class="w-full bg-gray-900">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <!--Grid-->
            <div class="py-16 flex justify-between items-center flex-col gap-8 lg:flex-row">
                <a href="https://merakitechlabs.com/"  class="flex justify-center ">
                    <h1 class="text-white text-4xl">merakitechlabs</h1>
                </a>
                <ul class="text-lg text-center sm:flex items-cente justify-center gap-14 lg:gap-10 xl:gap-14 transition-all duration-500">
                    <li ><a href="{{ route('about-us') }}" class="text-white hover:text-indigo-600">About Us</a></li>
                    <li class="sm:my-0 my-2" ><a href="{{ route('privacy-policy') }}"  class="text-white hover:text-indigo-600">Privacy Policy</a></li>
                    <li ><a href="{{ route('terms-and-conditions') }}"  class="text-white hover:text-indigo-600">Terms and Conditions</a></li>
                    <li  class="sm:my-0 my-2"><a href="{{ route('contact-us') }}"  class="text-white hover:text-indigo-600">Contact Us</a></li>
                </ul>
                <div class="flex  space-x-4 sm:justify-center  ">
                    <a href="javascript:;"  class="w-9 h-9 rounded-full bg-gray-800 flex justify-center items-center hover:bg-indigo-600">
                      <svg class="w-[1.25rem] h-[1.125rem] text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"     fill="none">
                          <path d="M22.675 0h-21.35C.56 0 0 .56 0 1.25v21.5C0 23.44.56 24 1.25 24h21.5c.69 0 1.25-.56 1.25-1.25V1.25C24 .56 23.44 0 22.675 0zm-3.52 12.03h-3.07v10.47h-4.07V12.03h-2.2v-4.03h2.2V5.29c0-2.3 1.27-3.59 3.3-3.59.96 0 1.99.17 1.99.17v2.3h-1.12c-1.1 0-1.42.68-1.42 1.37v1.63h2.83l-.45 4.03z" fill="currentColor"/>
                      </svg> 
                    </a>
                    <a href="https://www.linkedin.com/company/merakitechlabs/?viewAsMember=true" target="_blank"  class="w-9 h-9 rounded-full bg-gray-800 flex justify-center items-center hover:bg-indigo-600">
                        <svg class="w-[1rem] h-[1rem] text-white" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.8794 11.5527V3.86835H0.318893V11.5527H2.87967H2.8794ZM1.59968 2.81936C2.4924 2.81936 3.04817 2.2293 3.04817 1.49188C3.03146 0.737661 2.4924 0.164062 1.61666 0.164062C0.74032 0.164062 0.167969 0.737661 0.167969 1.49181C0.167969 2.22923 0.723543 2.8193 1.5829 2.8193H1.59948L1.59968 2.81936ZM4.29668 11.5527H6.85698V7.26187C6.85698 7.03251 6.87369 6.80255 6.94134 6.63873C7.12635 6.17968 7.54764 5.70449 8.25514 5.70449C9.18141 5.70449 9.55217 6.4091 9.55217 7.44222V11.5527H12.1124V7.14672C12.1124 4.78652 10.8494 3.68819 9.16483 3.68819C7.78372 3.68819 7.17715 4.45822 6.84014 4.98267H6.85718V3.86862H4.29681C4.33023 4.5895 4.29661 11.553 4.29661 11.553L4.29668 11.5527Z" fill="currentColor"/>
                            </svg>
                            
                    </a>
                    <a href="https://www.youtube.com/@merakitechlabs" target="_blank"  class="w-9 h-9 rounded-full bg-gray-800 flex justify-center items-center hover:bg-indigo-600">
                        <svg class="w-[1.25rem] h-[0.875rem] text-white" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.9346 1.13529C14.5684 1.30645 15.0665 1.80588 15.2349 2.43896C15.5413 3.58788 15.5413 5.98654 15.5413 5.98654C15.5413 5.98654 15.5413 8.3852 15.2349 9.53412C15.0642 10.1695 14.5661 10.669 13.9346 10.8378C12.7886 11.1449 8.19058 11.1449 8.19058 11.1449C8.19058 11.1449 3.59491 11.1449 2.44657 10.8378C1.81277 10.6666 1.31461 10.1672 1.14622 9.53412C0.839844 8.3852 0.839844 5.98654 0.839844 5.98654C0.839844 5.98654 0.839844 3.58788 1.14622 2.43896C1.31695 1.80353 1.81511 1.30411 2.44657 1.13529C3.59491 0.828125 8.19058 0.828125 8.19058 0.828125C8.19058 0.828125 12.7886 0.828125 13.9346 1.13529ZM10.541 5.98654L6.72178 8.19762V3.77545L10.541 5.98654Z" fill="currentColor"/>
                            </svg>
                            
                    </a>
                </div>
            </div>
            <!--Grid-->
            <div class="py-7 border-t border-gray-700">
                <div class="flex items-center justify-center">
                    <span class="text-gray-400 ">©<a href="http://127.0.0.1:8000/">merakitechlabs.com</a> 2024, All rights reserved.</span>
                </div>
            </div>
        </div>
    </footer>
    <!--End Footer New -->
    @livewireScripts
</body>
</html>