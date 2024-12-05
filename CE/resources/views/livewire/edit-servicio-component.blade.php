<div>
    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Editar Servicio
        </x-slot>

        <x-slot name="content">
            <!-- Nombre del Servicio -->
            <div class="mb-4">
                <x-label value="Nombre de la Servicio" />
                <x-input type="text" class="w-full" wire:model.defer="nombre"></x-input>
                @error('nombre')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Tipo de Servicio -->
            <div class="mb-4">
                <x-label value="Tipo de Servicio" />
                <x-input type="text" class="w-full" wire:model.defer="tipo_de_servicio"></x-input>
                @error('tipo_de_servicio')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Contenido -->
            <div class="mb-4">
                <x-label value="Contenido" />
                <x-input type="text" class="w-full" wire:model.defer="contenido"></x-input>
                @error('contenido')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <x-label value="Imagen Actual o Nueva" />
                @if ($path)
                    <img src="{{ $path }}" alt="Previsualización de la imagen" class="w-32 h-32 object-cover mt-2" />
                @else
                    <span>No hay imagen para mostrar.</span>
                @endif
            </div>
            
            <div class="mb-4">
                <x-label value="Cargar Nueva Imagen" />
                <x-input type="file" class="w-full mt-2" accept="image/*" wire:model="newImage" />
                @error('newImage')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
            
        </x-slot>

        <x-slot name="footer">
            <x-danger-button wire:click="$set('open', false)">
                Cerrar
            </x-danger-button>
            <x-button wire:click="save" class="ml-2">
                Guardar
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
