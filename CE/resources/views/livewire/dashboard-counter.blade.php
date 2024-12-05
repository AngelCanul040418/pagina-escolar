<div class="grid grid-cols-4 gap-4">
    <!-- Ofertas Activas -->
    <div class="bg-white p-4 rounded-lg shadow-lg flex items-center">
        <div class="text-blue-600 bg-blue-100 p-3 rounded-full">
            <i class="fas fa-tags text-xl"></i>
        </div>
        <div class="ml-3">
            <h2 class="text-xl font-bold text-gray-800">{{ $ofertasCount }}</h2>
            <p class="text-xs text-gray-500">Ofertas Activas</p>
        </div>
    </div>

    <!-- Servicios Activos -->
    <div class="bg-white p-4 rounded-lg shadow-lg flex items-center">
        <div class="text-green-600 bg-green-100 p-3 rounded-full">
            <i class="fas fa-concierge-bell text-xl"></i>
        </div>
        <div class="ml-3">
            <h2 class="text-xl font-bold text-gray-800">{{ $serviciosCount }}</h2>
            <p class="text-xs text-gray-500">Servicios Activos</p>
        </div>
    </div>

    <!-- Usuarios Registrados -->
    <div class="bg-white p-4 rounded-lg shadow-lg flex items-center">
        <div class="text-gray-600 bg-gray-100 p-3 rounded-full">
            <i class="fas fa-users text-xl"></i>
        </div>
        <div class="ml-3">
            <h2 class="text-xl font-bold text-gray-800">{{ $usersCount }}</h2>
            <p class="text-xs text-gray-500">Usuarios Registrados</p>
        </div>
    </div>

    <!-- Imágenes -->
    <div class="bg-white p-4 rounded-lg shadow-lg flex items-center">
        <div class="text-gray-600 bg-gray-100 p-3 rounded-full">
            <i class="fas fa-image text-xl"></i>
        </div>
        <div class="ml-3">
            <h2 class="text-xl font-bold text-gray-800">{{ $imageCount }}</h2>
            <p class="text-xs text-gray-500">Imágenes</p>
        </div>
    </div>
</div>
