<?php

namespace App\Livewire;

use App\Models\OfertaEducativa;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearOfertaComponente extends Component
{
    use WithFileUploads;

    public $open = false;
    public $nombre;
    public $etapa_inicial;
    public $duracion_cuatri_in;
    public $etapa_continuidad;
    public $duracion_cuatri_con;
    public $horas_totales;
    public $creditos_totales;
    public $mapa_curricular;
    public $imagen; // Nueva propiedad para la imagen

    public function save()
    {
        // Validación
        $this->validate([
            'nombre' => 'required|string|max:255',
            'etapa_inicial' => 'required|string|max:255',
            'duracion_cuatri_in' => 'required|integer',
            'etapa_continuidad' => 'required|string|max:255',
            'duracion_cuatri_con' => 'required|integer',
            'horas_totales' => 'required|integer',
            'creditos_totales' => 'required|numeric',
            'mapa_curricular' => 'nullable|file|mimes:pdf|max:10240',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:10240', // Validación para imágenes
        ]);


        // Calcular la duración total
        $duracion_total_programa = $this->duracion_cuatri_in + $this->duracion_cuatri_con;

        // Asigna el nombre al archivo PDF utilizando el nombre de la oferta educativa
        $fileName = 'mapa_curricular_' . str_replace(' ', '_', preg_replace('/[^\w]/', '_', $this->nombre)) . '.pdf';

        $imagenFileName = $this->imagen
            ? 'imagen_' . str_replace(' ', '_', preg_replace('/[^\w]/', '_', $this->nombre)) . '.' . $this->imagen->extension()
            : null;


        // Crear la oferta educativa
        OfertaEducativa::create([
            'nombre' => $this->nombre,
            'etapa_inicial' => $this->etapa_inicial,
            'duracion_cuatri_in' => $this->duracion_cuatri_in,
            'etapa_continuidad' => $this->etapa_continuidad,
            'duracion_cuatri_con' => $this->duracion_cuatri_con,
            'horas_totales' => $this->horas_totales,
            'creditos_totales' => $this->creditos_totales,
            'duracion_total_programa' => $duracion_total_programa,
            'mapa_curricular' => $this->mapa_curricular
                ? $this->mapa_curricular->storeAs('mapas_curriculares', $fileName, 'public')
                : null,
            'imagen' => $this->imagen
                ? $this->imagen->storeAs('ofertas_imagenes', $imagenFileName, 'public')
                : null,
        ]);

        // Emitir evento y reiniciar el formulario
        $this->dispatch('ofertas')->to(OfAdminComponente::class);
        $this->dispatch('alert', '¡La Oferta se ha creado exitosamente!');
        $this->reset([
            'open',
            'nombre',
            'etapa_inicial',
            'duracion_cuatri_in',
            'etapa_continuidad',
            'duracion_cuatri_con',
            'horas_totales',
            'creditos_totales',
            'mapa_curricular',
            'imagen'
        ]);
        $this->open = false;
    }


    public function render()
    {
        return view('livewire.crear-oferta-componente');
    }
}
