<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <!-- Primer Contenedor (Livewire: dashboard-counter) -->
        <div class="bg-gradient-to-r from-blue-50 to-blue-100 shadow-lg rounded-lg p-6 mb-6">
            <livewire:dashboard-counter />
        </div>

        <!-- Segundo Contenedor (Livewire: dashboard-mejores-ofertas) -->
        <div class="bg-gradient-to-r from-green-50 to-green-100 shadow-lg rounded-lg p-6 mb-6 border-l-4 border-green-500">
            <livewire:dashboard-mejores-ofertas />
        </div>

        <!-- Tercer Contenedor (Livewire: graficas-usuarios) -->
        <div class="bg-gradient-to-r from-purple-50 to-purple-100 shadow-xl sm:rounded-lg p-6">
            <livewire:graficas-usuarios />
        </div>
    </div>
</x-app-layout>
