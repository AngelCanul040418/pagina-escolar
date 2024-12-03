<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head class="">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    <script src="https://unpkg.com/@alpinejs/focus@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="font-sans antialiased ">

    <div x-data="{ open: true }" class="flex min-h-screen">
        <!-- Sidebar -->
        <aside id="sidebar" :class="open ? 'w-64' : 'w-20'"
            class="fixed top-0 left-0 text-white border-r shadow-lg transition-all bg-[#05031b] h-screen">
            <div class="p-3 h-full flex flex-col justify-between">
                <!-- Top Section -->
                <div>
                    <!-- Toggle Button -->
                    <button id="sidebar-toggle"
                        class="flex items-center p-2 mb-6 transition-all bg-red-700 hover:bg-red-800 rounded-lg text-white"
                        @click="open = !open" aria-expanded="true" aria-label="Toggle Sidebar">
                        <i class="fas" :class="open ? 'fa-chevron-left' : 'fa-bars'"></i>
                        <span class="ml-2 font-semibold text-sm" :class="open ? 'block' : 'hidden'">
                            Universidad Tecnológica del Poniente
                        </span>
                    </button>

                    <!-- Navigation -->
                    <nav>
                        <ul class="space-y-3">
                            @php
                                $routes = [
                                    ['name' => 'dashboard', 'icon' => 'fas fa-tachometer-alt', 'label' => 'Dashboard'],
                                    [
                                        'name' => 'usuarios.index',
                                        'icon' => 'fas fa-users',
                                        'label' => 'Tabla de Usuarios',
                                    ],
                                    [
                                        'name' => 'oferta-educativa.index',
                                        'icon' => 'fas fa-graduation-cap',
                                        'label' => 'Oferta Educativa',
                                    ],
                                    [
                                        'name' => 'mejor-oferta.index',
                                        'icon' => 'fas fa-graduation-cap',
                                        'label' => 'Mejor Oferta Educativa',
                                    ],
                                    [
                                        'name' => 'servicios.index',
                                        'icon' => 'fas fa-concierge-bell',
                                        'label' => 'Servicios',
                                    ],
                                    ['name' => 'imagenes.index', 'icon' => 'fa-solid fa-images', 'label' => 'Imágenes'],
                                ];
                            @endphp

                            @foreach ($routes as $route)
                                <li>
                                    <a href="{{ route($route['name']) }}"
                                        class="group flex items-center p-2 rounded-lg transition-all 
                                          {{ request()->routeIs($route['name']) ? 'bg-red-700 text-white' : 'text-gray-400 hover:bg-red-600 hover:text-white' }}">
                                        <!-- Icon container -->
                                        <div class="w-10 h-10 flex items-center justify-center">
                                            <i
                                                class="{{ $route['icon'] }} text-lg 
                                                {{ request()->routeIs($route['name']) ? 'text-white' : 'group-hover:text-white' }}">
                                            </i>
                                        </div>
                                        <!-- Label -->
                                        <span class="ml-3 transition-all text-sm font-medium"
                                            :class="open ? 'block' : 'hidden'">
                                            {{ $route['label'] }}
                                        </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>
        </aside>

        <!-- Contenido principal -->
        <main :class="open ? 'ml-64' : 'ml-20'" class="flex-1 bg-gray-100 h-screen transition-all">
            <!-- Page Heading -->
            @if (isset($header))
                <header class="text-white border-r shadow-lg transition-all bg-[#05031b]">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        @livewire('navigation-menu')
                    </div>
                </header>
            @endif
            <!-- Page Content -->
            <div class="shadow h-full flex flex-col">
                <!-- Header -->
                <div class="text-white text-2xl font-bold py-4 px-6 bg-opacity-90 shadow-lg">
                    {{ $header }}
                </div>
                <!-- Slot (contenido principal) -->
                <div class="flex-grow p-6">
                    {{ $slot }}
                </div>
            </div>
        </main>
    </div>

    @stack('modals')

    @livewireScripts
    <script>
        function confirmDelete(ofertaId) {
            // Mostrar alerta de confirmación
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta acción eliminará la oferta permanentemente.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Ejecutar la función de eliminación de Livewire si se confirma
                    window.Livewire.dispatch('deleteOferta', {
                        ofertaId
                    });
                }
            });
        }

        function confirmDeleteIm(imagenId) {
            // Mostrar alerta de confirmación
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta acción eliminará la Imagen permanentemente.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Ejecutar la función de eliminación de Livewire si se confirma
                    window.Livewire.dispatch('deleteImage', imagenId);
                }
            });
        }

        function deleteServicio(servicioId) {
            // Mostrar alerta de confirmación
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta acción eliminará el servicio permanentemente.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Ejecutar la función de eliminación de Livewire si se confirma
                    window.Livewire.dispatch('deleteServicio', servicioId); // Corregido aquí
                }
            });
        }

        // Mantener la alerta de éxito después de eliminar
        Livewire.on('alert', function(message) {
            Swal.fire({
                title: "Listo",
                text: message,
                icon: "success"
            });
        });
    </script>


</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</html>
