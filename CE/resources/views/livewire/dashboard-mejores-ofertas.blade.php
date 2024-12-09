<div class="p-6 bg-white shadow-lg rounded-lg border border-gray-200">
    @if($ultimaoferta)
        <h3 class="text-xl font-semibold text-blue-600 mb-4">Última mejor oferta publicada</h3>
        <div class="space-y-2">
            <!-- Título -->
            <div class="flex items-center space-x-4">
                <p class="text-md text-gray-800 font-medium w-36">Título:</p>
                <p class="text-sm text-gray-600">{{ $ultimaoferta->ofertaEducativa->nombre }}</p>
            </div>

            <!-- Etapa inicial -->
            <div class="flex items-center space-x-4">
                <p class="text-md text-gray-800 font-medium w-36">Etapa inicial:</p>
                <p class="text-sm text-gray-600">{{ $ultimaoferta->etapa_inicial }}</p>
            </div>

            <!-- Continuidad -->
            <div class="flex items-center space-x-4">
                <p class="text-md text-gray-800 font-medium w-36">Continuidad:</p>
                <p class="text-sm text-gray-600">{{ $ultimaoferta->etapa_continuidad }}</p>
            </div>
        </div>
    @else
        <div class="p-4 text-center">
            <p class="text-sm text-gray-600 italic">No hay ofertas disponibles.</p>
        </div>
    @endif
</div>
