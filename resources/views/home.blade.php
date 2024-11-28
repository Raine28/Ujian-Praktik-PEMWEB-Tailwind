<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body class="bg-gray-100">
    <nav class="bg-gray-900 shadow-lg">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button type="button"
                        class="relative inline-flex items-center justify-center p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        @guest
                            <a href="{{ route('login') }}"
                                class="text-white hover:bg-gray-700 px-4 py-2 rounded-md text-sm font-medium">Log In</a>
                            <a href="{{ route('register') }}"
                                class="text-white hover:bg-gray-700 px-4 py-2 rounded-md text-sm font-medium">Register</a>
                        @else
                            <span class="text-white px-4 py-2 text-sm font-medium">{{ auth()->user()->name }}</span>
                            <a href="{{ route('logout') }}"
                                class="text-white hover:bg-gray-700 px-4 py-2 rounded-md text-sm font-medium"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endguest
                        <a href="{{ route('products.index') }}"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white px-4 py-2 rounded-md text-sm font-medium">Daftar Produk</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-base font-semibold text-indigo-600">Check Our Products</h2>
                <p class="mt-2 text-4xl font-semibold text-gray-900 sm:text-5xl">Wardrobe.com</p>
                <p class="mt-6 text-lg text-gray-600">From Top to Bottom!</p>
            </div>

            <div class="mt-12">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <h2 class="text-2xl font-bold text-gray-900">Top</h2>

                    <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                        <div class="group relative bg-white border rounded-lg shadow-lg overflow-hidden hover:scale-105 transform transition-all">
                            <img src="image/top1.jpg" alt="Front of men's Basic Tee in black." class="object-cover w-full h-64 group-hover:opacity-80">
                            <div class="p-4">
                                <h3 class="text-lg font-medium text-gray-900">
                                    Button Up Puff Sleeve Lace White Blouse
                                </h3>
                                <p class="mt-2 text-sm text-gray-500">White and Blue</p>
                                <p class="mt-4 text-lg font-semibold text-gray-900">Rp200.000</p>
                            </div>
                        </div>

                        <div class="group relative bg-white border rounded-lg shadow-lg overflow-hidden hover:scale-105 transform transition-all">
                            <img src="image/top2.jpg" alt="Pencil Stripe White Shirt" class="object-cover w-full h-64 group-hover:opacity-80">
                            <div class="p-4">
                                <h3 class="text-lg font-medium text-gray-900">
                                    Pencil Stripe White Shirt
                                </h3>
                                <p class="mt-2 text-sm text-gray-500">White and Gray</p>
                                <p class="mt-4 text-lg font-semibold text-gray-900">Rp200.000</p>
                            </div>
                        </div>

                        <div class="group relative bg-white border rounded-lg shadow-lg overflow-hidden hover:scale-105 transform transition-all">
                            <img src="image/top3.jpg" alt="Off-Shoulder Black Top" class="object-cover w-full h-64 group-hover:opacity-80">
                            <div class="p-4">
                                <h3 class="text-lg font-medium text-gray-900">
                                    Off-Shoulder Black Top
                                </h3>
                                <p class="mt-2 text-sm text-gray-500">Black</p>
                                <p class="mt-4 text-lg font-semibold text-gray-900">Rp200.000</p>
                            </div>
                        </div>

                        <div class="group relative bg-white border rounded-lg shadow-lg overflow-hidden hover:scale-105 transform transition-all">
                            <img src="image/top4.jpg" alt="Women Vest Top" class="object-cover w-full h-64 group-hover:opacity-80">
                            <div class="p-4">
                                <h3 class="text-lg font-medium text-gray-900">
                                    Women Vest Top
                                </h3>
                                <p class="mt-2 text-sm text-gray-500">Gray</p>
                                <p class="mt-4 text-lg font-semibold text-gray-900">Rp200.000</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-24 bg-white">
                    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                        <h2 class="text-2xl font-bold text-gray-900">Bottom</h2>

                        <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                            <div class="group relative bg-white border rounded-lg shadow-lg overflow-hidden hover:scale-105 transform transition-all">
                                <img src="image/bot1.jpg" alt="Pleated Mini Skirt" class="object-cover w-full h-64 group-hover:opacity-80">
                                <div class="p-4">
                                    <h3 class="text-lg font-medium text-gray-900">
                                        Pleated Mini Skirt
                                    </h3>
                                    <p class="mt-2 text-sm text-gray-500">Dark Gray</p>
                                    <p class="mt-4 text-lg font-semibold text-gray-900">Rp200.000</p>
                                </div>
                            </div>

                            <div class="group relative bg-white border rounded-lg shadow-lg overflow-hidden hover:scale-105 transform transition-all">
                                <img src="image/bot2.jpg" alt="Blue Skirt" class="object-cover w-full h-64 group-hover:opacity-80">
                                <div class="p-4">
                                    <h3 class="text-lg font-medium text-gray-900">
                                        Blue Skirt
                                    </h3>
                                    <p class="mt-2 text-sm text-gray-500">Navy</p>
                                    <p class="mt-4 text-lg font-semibold text-gray-900">Rp200.000</p>
                                </div>
                            </div>

                            <div class="group relative bg-white border rounded-lg shadow-lg overflow-hidden hover:scale-105 transform transition-all">
                                <img src="image/bot3.jpg" alt="Brown Layer Skirt" class="object-cover w-full h-64 group-hover:opacity-80">
                                <div class="p-4">
                                    <h3 class="text-lg font-medium text-gray-900">
                                        Brown Layer Skirt
                                    </h3>
                                    <p class="mt-2 text-sm text-gray-500">Brown and Cream</p>
                                    <p class="mt-4 text-lg font-semibold text-gray-900">Rp200.000</p>
                                </div>
                            </div>

                            <div class="group relative bg-white border rounded-lg shadow-lg overflow-hidden hover:scale-105 transform transition-all">
                                <img src="image/bot4.jpg" alt="Dark Brown Skirt" class="object-cover w-full h-64 group-hover:opacity-80">
                                <div class="p-4">
                                    <h3 class="text-lg font-medium text-gray-900">
                                        Dark Brown Skirt
                                    </h3>
                                    <p class="mt-2 text-sm text-gray-500">Dark Brown</p>
                                    <p class="mt-4 text-lg font-semibold text-gray-900">Rp200.000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
