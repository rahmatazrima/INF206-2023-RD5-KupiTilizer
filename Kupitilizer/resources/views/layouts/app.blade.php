<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @yield('script')
    </head>
    <body class="antialiased">
        @if(session()->has('failed'))
        <div id="error-banner" tabindex="-1" class="fixed z-50 flex flex-col md:flex-row justify-between w-[calc(100%-2rem)] p-4 -translate-x-1/2 bg-white border border-gray-100 rounded-lg shadow-sm lg:max-w-7xl left-1/2 top-6 dark:bg-gray-700 dark:border-gray-600">
            <div class="flex flex-col items-start mb-3 mr-4 md:items-center md:flex-row md:mb-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0-10.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.249-8.25-3.286zm0 13.036h.008v.008H12v-.008z" />
                </svg>
                <p class="flex items-center py-2 mx-5 text-xl font-bold text-gray-500 dark:text-gray-400">{{session('failed')}}</p>
            </div>
            <div class="flex items-center flex-shrink-0">
                <button data-dismiss-target="#error-banner" type="button" class="absolute top-2.5 right-2.5 md:relative md:top-auto md:right-auto flex-shrink-0 inline-flex justify-center items-center text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close banner</span>
                </button>
            </div>
        </div>
        @endif

        @if(session()->has('success'))
        <div id="error-banner" tabindex="-1" class="fixed z-50 flex flex-col md:flex-row justify-between w-[calc(100%-2rem)] p-4 -translate-x-1/2 bg-white border border-gray-100 rounded-lg shadow-sm lg:max-w-7xl left-1/2 top-6 dark:bg-gray-700 dark:border-gray-600">
            <div class="flex flex-col items-start mb-3 mr-4 md:items-center md:flex-row md:mb-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0-10.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.249-8.25-3.286zm0 13.036h.008v.008H12v-.008z" />
                </svg>
                <p class="flex items-center py-2 mx-5 text-xl font-bold text-gray-500 dark:text-gray-400">{{session('success')}}</p>
            </div>
            <div class="flex items-center flex-shrink-0">
                <button data-dismiss-target="#error-banner" type="button" class="absolute top-2.5 right-2.5 md:relative md:top-auto md:right-auto flex-shrink-0 inline-flex justify-center items-center text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close banner</span>
                </button>
            </div>
        </div>
        @endif

        <nav class="bg-dark py-5">
            <div class="flex flex-wrap items-center justify-around mx-auto p-4 sm:p-0 sm:mx-2">
                <a href="{{url('/')}}" class="flex items-center">
                    <img src="{{asset('images/logo.webp')}}" class="h-8 mr-3 bg-white rounded-3xl" alt="Kupitilizer Logo" />
                    <span class="self-center text-md font-semibold text-white whitespace-nowrap">Kupitilizer</span>
                </a>
                <div class="flex items-center sm:order-2">
                    @if(Auth::check())
                    <button type="button" class="flex mr-3 text-sm hover:text-leaf text-white rounded-full md:mr-0 hover:ring-2 hover:ring-leaf " id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                        <span class="sr-only">Open user menu</span>
                        <span class="sm:block text-sm font-bold m-2 mx-4 hidden">{{Auth::user()->name}}</span>
                        <img class="w-8 h-8 rounded-full" src="{{url('images/user.png')}}" alt="user photo">
                    </button>
                    <!-- Dropdown menu -->
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow" id="user-dropdown">
                        <div class="px-4 py-3">
                            <span class="block text-sm text-gray-900">{{Auth::user()->name}}</span>
                            <span class="block text-xs  text-gray-500 truncate">{{Auth::user()->id}}</span>
                            <span class="block text-sm  text-gray-500 truncate">{{Auth::user()->email}}</span>
                        </div>
                            <ul class="py-2" aria-labelledby="user-menu-button">
                                @if(Auth::user()->role == "user")
                                <li>
                                    <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                                </li>
                                <li>
                                    <a href="/statuspermintaan" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Status Permintaan</a>
                                </li>
                                <li>
                                    <a href="/keranjang" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Keranjang</a>
                                </li>
                                @else
                                <li>
                                    <a href="/<?php echo Auth::user()->role?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                                </li>
                                @endif
                                <li>
                                    <a href="{{url('/setting')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                                </li>
                                <li>
                                    <form method="POST" action="{{url('logout')}}">
                                        @csrf
                                        <div class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            <button type="submit" class="">Sign out</button>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                    </div>
                    @else
                        <button data-modal-target="login-modal" data-modal-toggle="login-modal" class="block px-4 py-1 sm:py-2 bg-leaf hover:bg-leaf hover:text-dark text-white font-bold rounded-xl" type="button">
                            Login
                        </button>
                    @endif
                    <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="mobile-menu-2" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <div class="items-center justify-between hidden w-full sm:flex sm:w-auto sm:order-1" id="mobile-menu-2">
                    <ul class="flex flex-col font-medium sm:p-0 mt-4 sm:my-2 sm:flex-row">
                        <li>
                            <a href="{{url('/requestjemput')}}" class="block px-20 py-1 sm:py-2 hover:bg-leaf hover:text-dark text-white font-bold rounded-xl">Request Penjemputan</a>
                        </li>
                        <li>
                            <a href="{{url('/market')}}" class="block px-20 py-1 sm:py-2 hover:bg-leaf hover:text-dark text-white font-bold rounded-xl">Beli produk</a>
                        </li>
                        <li>
                            <a href="{{url('/coupon')}}" class="block px-20 py-1 sm:py-2 hover:bg-leaf hover:text-dark text-white font-bold rounded-xl">Kupon</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="min-h-screen">
            @yield('content')
        </div>

        <footer class="bg-dark">
            <div class="mx-auto w-full max-w-screen-xl">
            <div class="grid grid-cols-2 gap-8 px-4 py-6 md:grid-cols-3">
                <div class="col-span-2 md:col-auto">
                    <div class="flex">
                        <img src="{{asset('images/logo.webp')}}" class="h-20 mr-3 rounded-3xl" alt="Kupitilizer Logo" />
                        <span class="self-center text-md font-semibold text-white whitespace-nowrap">Kupitilizer</span>
                    </div>
                    <h2 class="my-2 text-sm font-semibold text-leaf uppercase">About Us</h2>
                    <p class="text-sm text-gray-400">
                        Etiam consequat sem ullamcorper, 
                        <br>
                        euismod metus sit amet, tristique justo. 
                        <br>
                        Vestibulum mattis, nisi ut.
                    </p>
                </div>
                <div>
                    <h2 class="text-sm font-semibold text-leaf uppercase">Contact Info</h2>
                    <hr class="text-leaf mb-6">
                    <ul class="text-gray-500 dark:text-gray-400 font-medium">
                        <li class="mb-4 flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                            <div>
                                <p class="">Our location</p>
                                <p class="text-white text-xs">
                                    JL. Syech Abdurrauf No.3, Kopelma Darussalam, 
                                    <br>
                                    Kec. Syiah Kuala, Kota Banda Aceh, Aceh 23111
                                </p>
                            </div>
                        </li>
                        <li class="mb-4 flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                            </svg>
                            <div>
                                <p class="">Phones</p>
                                <p class="text-white text-xs">
                                    0823xxxxxxxx
                                </p>
                            </div>
                        </li>
                        <li class="mb-4 flex hover:text-leaf">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                            </svg>
                            <div class="">
                                <a href="{{ url('/aboutus') }}" class="">Our Team</a>
                                <p class="hover:text-current text-xs">
                                    Click Here !!
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="text-sm font-semibold text-leaf uppercase">Features</h2>
                    <hr class="text-leaf mb-6">
                    <ul class="text-gray-500 dark:text-gray-400 font-medium">
                    <li class="mb-4">
                            <a href="{{url('/requestjemput')}}" class="hover:underline">Request Penjemputan</a>
                        </li>
                        <li class="mb-4">
                            <a href="{{url('/market')}}" class="hover:underline">Beli Produk</a>
                        </li>
                        <li class="mb-4">
                            <a href="{{url('/coupon')}}" class="hover:underline">Kupon</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="px-4 py-6 md:flex md:items-center md:justify-between">
                <span class="text-sm text-gray-500 sm:text-center">© 2023 <a href="{{ url('/aboutus') }}">RPL-RD5™</a>. All Rights Reserved.
                </span>
                <div class="flex mt-4 space-x-6 sm:justify-center md:mt-0">
                    <a href="#" class="text-gray-400 hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                        <span class="sr-only">Facebook page</span>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg>
                        <span class="sr-only">Instagram page</span>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
                        <span class="sr-only">Twitter page</span>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg>
                        <span class="sr-only">GitHub account</span>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd" /></svg>
                        <span class="sr-only">Dribbble account</span>
                    </a>
                </div>
            </div>
            </div>
        </footer>

        <!-- Login modal -->
        <div id="login-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
            <div class="relative w-full h-full max-w-md md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="login-modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="px-6 py-6 lg:px-8">

                        <!-- Logo -->
                        <div>
                            <img class = "h-auto mx-auto w-5/12" src="{{asset('images/logo.png')}}" alt="">
                        </div>

                        <!-- Label form -->
                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Masuk Akun</h3>
                        <form class=" rounded-lg space-y-6 " method="POST" action="{{ route('login') }}">
                            @csrf 
                            <div>

                                <!-- Label input-->
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat E-mail</label>
                                
                                <!-- Input Email-->
                                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required>
                            </div>
                            <div>

                                <!-- Label input-->
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kata Sandi</label>
                                
                                <!-- Input Password-->
                                <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                            </div>

                            <div class="flex justify-between">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800">
                                    </div>

                                    <!-- Label ingat saya-->
                                    <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ingat Saya</label>
                                
                                </div>
                            </div>
                            <!-- Button submit -->
                            <button type="submit" class=" md:mx-auto w-full text-white bg-leaf focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Masuk</button>
                            
                            <!-- Button akses register-modal-->
                            <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                                <button data-modal-hide="login-modal" data-modal-target="register-modal" data-modal-toggle="register-modal" class="block  text-center sm:py-2 bg-white hover:bg-white hover:text-dark text-leaf font-bold rounded-xl" type="button">Daftar di sini</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> 

        <!-- Register modal -->
        <div id="register-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
            <div class="relative w-full h-full max-w-2xl md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">

                    <!-- Button close modal-->
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="register-modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>

                    <div class="px-6 py-6 lg:px-8">

                        <!-- Logo -->
                        <div>
                            <img class = "h-auto mx-auto w-5/12" src="{{asset('images/logo.png')}}" alt="">
                        </div>

                        <!-- Label form -->
                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Daftarkan Akun</h3>
                        <form class="space-y-6" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="sm:grid sm:grid-cols-2 gap-4">
                                <div class="sm:mr-5">

                                    <!-- Label input-->
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>

                                    <!-- Input Nama -->
                                    <input type="name" name="name" id="name" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nama Lengkap Anda" required>
                                </div>

                                <div>

                                    <!-- Label input-->
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                    
                                    <!-- Input Email -->
                                    <input type="email" name="email" id="email" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required>
                                </div>

                                <div class="sm:mr-5">

                                    <!-- Label input-->
                                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kata Sandi</label>
                                    
                                    <!-- Input Password -->
                                    <input type="password" name="password" id="password" placeholder="••••••••" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                </div>

                                <div>

                                    <!-- Label input-->
                                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi Kata Sandi</label>
                                    
                                    <!-- Input Password confirmation -->
                                    <input type="password" name="password_confirmation" id="password" placeholder="••••••••" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required autocomplete = "new-password">
                                </div>
                            </div>

                            <!-- Button submit -->
                            <button type="submit" class="mb-px w-full text-white bg-leaf focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Daftarkan Akun</button>
                            
                            <!-- Akses login-modal -->
                            <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                            Sudah Punya Akun?<button data-modal-hide="register-modal" data-modal-target="login-modal" data-modal-toggle="login-modal" class="block  text-center sm:py-2 bg-white hover:bg-white hover:text-dark text-leaf font-bold rounded-xl" type="button">Login di sini</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div> 
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
    </body>
</html>
