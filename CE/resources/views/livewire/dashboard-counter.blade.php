<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    <!-- Ofertas Activas -->
    <a href="/oferta-educativa" class="bg-gradient-to-r from-blue-100 to-blue-50 p-6 rounded-lg shadow-lg flex items-center transform transition duration-300 hover:scale-105 hover:shadow-xl">
        <div class="text-blue-600 bg-blue-200 p-4 rounded-full shadow">
            <i class="fas fa-tags text-2xl"></i>
        </div>
        <div class="ml-4">
            <h2 class="text-2xl font-extrabold text-blue-800">{{ $ofertasCount }}</h2>
            <p class="text-sm text-blue-600">Ofertas Activas</p>
        </div>
    </a>

    <!-- Servicios Activos -->
    <a href="/servicios" class="bg-gradient-to-r from-green-100 to-green-50 p-6 rounded-lg shadow-lg flex items-center transform transition duration-300 hover:scale-105 hover:shadow-xl">
        <div class="text-green-600 bg-green-200 p-4 rounded-full shadow">
            <i class="fas fa-concierge-bell text-2xl"></i>
        </div>
        <div class="ml-4">
            <h2 class="text-2xl font-extrabold text-green-800">{{ $serviciosCount }}</h2>
            <p class="text-sm text-green-600">Servicios Activos</p>
        </div>
    </a>

    <!-- Usuarios Registrados -->
    <a href="/usuarios" class="bg-gradient-to-r from-purple-100 to-purple-50 p-6 rounded-lg shadow-lg flex items-center transform transition duration-300 hover:scale-105 hover:shadow-xl">
        <div class="text-purple-600 bg-purple-200 p-4 rounded-full shadow">
            <i class="fas fa-users text-2xl"></i>
        </div>
        <div class="ml-4">
            <h2 class="text-2xl font-extrabold text-purple-800">{{ $usersCount }}</h2>
            <p class="text-sm text-purple-600">Usuarios Registrados</p>
        </div>
    </a>

    <!-- Imágenes -->
    <a href="/imagenes" class="bg-gradient-to-r from-pink-100 to-pink-50 p-6 rounded-lg shadow-lg flex items-center transform transition duration-300 hover:scale-105 hover:shadow-xl">
        <div class="text-pink-600 bg-pink-200 p-4 rounded-full shadow">
            <i class="fas fa-image text-2xl"></i>
        </div>
        <div class="ml-4">
            <h2 class="text-2xl font-extrabold text-pink-800">{{ $imageCount }}</h2>
            <p class="text-sm text-pink-600">Imágenes</p>
        </div>
    </a>
</div>
