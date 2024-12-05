<div class="overflow-x-auto">
    <table class="table-auto w-full border-collapse bg-white shadow-lg rounded-lg">
        <thead class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white">
            <tr>
                <th class="px-6 py-3 text-left font-semibold text-sm uppercase">Nombre</th>
                <th class="px-6 py-3 text-left font-semibold text-sm uppercase">Etapa Inicial</th>
                <th class="px-6 py-3 text-left font-semibold text-sm uppercase">Duración Inicial</th>
                <th class="px-6 py-3 text-left font-semibold text-sm uppercase">Etapa Continuidad</th>
                <th class="px-6 py-3 text-left font-semibold text-sm uppercase">Duración Continuidad</th>
                <th class="px-6 py-3 text-left font-semibold text-sm uppercase">Duración Total</th>
                <th class="px-6 py-3 text-left font-semibold text-sm uppercase">Horas Totales</th>
                <th class="px-6 py-3 text-left font-semibold text-sm uppercase">Imagen</th>
                <th class="px-6 py-3 text-left font-semibold text-sm uppercase">Créditos Totales</th>
                <th class="px-6 py-3 text-center font-semibold text-sm uppercase">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ofertas as $oferta)
                <tr class="hover:bg-gray-100 border-b border-gray-200">
                    <td class="border px-6 py-4 text-gray-800">{{ $oferta->nombre }}</td>
                    <td class="border px-6 py-4 text-gray-800">{{ $oferta->etapa_inicial }}</td>
                    <td class="border px-6 py-4 text-gray-800">{{ $oferta->duracion_cuatri_in }}</td>
                    <td class="border px-6 py-4 text-gray-800">{{ $oferta->etapa_continuidad }}</td>
                    <td class="border px-6 py-4 text-gray-800">{{ $oferta->duracion_cuatri_con }}</td>
                    <td class="border px-6 py-4 text-gray-800">{{ $oferta->duracion_total_programa }}</td>
                    <td class="border px-6 py-4 text-gray-800">{{ $oferta->horas_totales }}</td>
                    <td class="border px-6 py-4 text-gray-800">
                        @if ($oferta->imagen)
                            <img src="{{ Storage::url($oferta->imagen) }}?v={{ now()->timestamp }}"
                                alt="Imagen de oferta">
                        @else
                            <span class="text-gray-500">Sin imagen</span>
                        @endif
                    </td>

                    <td class="border px-6 py-4 text-gray-800">{{ $oferta->creditos_totales }}</td>
                    <td class="border px-6 py-4 text-center">
                        <x-secondary-button wire:click="editOferta({{ $oferta->id }})"
                            class="text-blue-500 hover:text-blue-700">
                            Editar
                        </x-secondary-button>
                        <x-danger-button onclick="confirmDelete({{ $oferta->id }})"
                            class="text-red-500 hover:text-red-700 ml-2">
                            Eliminar
                        </x-danger-button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
