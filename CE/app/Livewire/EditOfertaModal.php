<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\OfertaEducativa;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class EditOfertaModal extends Component
{
    use WithFileUploads;

    public $open = false;
    public $oferta;
    public $nombre, $etapa_inicial,
        $duracion_cuatri_in, $etapa_continuidad,
        $duracion_cuatri_con, $duracion_total_programa,
        $horas_totales, $creditos_totales;
    public $mapa_curricular;
    public $imagen;

    public function mount(OfertaEducativa $oferta)
    {
        $this->oferta = $oferta;
    }

    protected $rules = [
        'nombre' => 'required',
        'etapa_inicial' => 'required',
        'duracion_cuatri_in' => 'required|integer',
        'etapa_continuidad' => 'required',
        'duracion_cuatri_con' => 'required|integer',
        'duracion_total_programa' => 'required|integer',
        'horas_totales' => 'required|integer',
        'creditos_totales' => 'required|integer',
        'mapa_curricular' => 'nullable|file|mimes:pdf',
        'imagen' => 'nullable|image|max:10240', // Nueva regla para la imagen
    ];

    protected $listeners = ['editOferta' => 'loadOferta'];

    public function loadOferta($ofertaId)
    {
        $oferta = OfertaEducativa::find($ofertaId);
        if ($oferta) {
            $this->oferta = $oferta;
            $this->nombre = $oferta->nombre;
            $this->etapa_inicial = $oferta->etapa_inicial;
            $this->duracion_cuatri_in = $oferta->duracion_cuatri_in;
            $this->etapa_continuidad = $oferta->etapa_continuidad;
            $this->duracion_cuatri_con = $oferta->duracion_cuatri_con;
            $this->duracion_total_programa = $oferta->duracion_total_programa;
            $this->horas_totales = $oferta->horas_totales;
            $this->creditos_totales = $oferta->creditos_totales;
            $this->mapa_curricular = null; // No asignar el archivo actual
            $this->imagen = null; // No asignar la imagen actual
            $this->open = true;
        }
    }

    public function updated($propertyName)
    {
        if ($propertyName === 'duracion_cuatri_in' || $propertyName === 'duracion_cuatri_con') {
            $this->duracion_total_programa = $this->duracion_cuatri_in + $this->duracion_cuatri_con;
        }
    }

    public function updatedImagen()
    {
        if ($this->imagen instanceof TemporaryUploadedFile) {
            $this->validate([
                'imagen' => 'nullable|image|max:10240',
            ]);
        }
    }

    public function save()
    {
        $this->validate();

        $data = [
            'nombre' => $this->nombre,
            'etapa_inicial' => $this->etapa_inicial,
            'duracion_cuatri_in' => $this->duracion_cuatri_in,
            'etapa_continuidad' => $this->etapa_continuidad,
            'duracion_cuatri_con' => $this->duracion_cuatri_con,
            'duracion_total_programa' => $this->duracion_total_programa,
            'horas_totales' => $this->horas_totales,
            'creditos_totales' => $this->creditos_totales,
        ];

        // Manejo de la imagen
        if ($this->imagen instanceof TemporaryUploadedFile) {
            // Eliminar imagen anterior si existe
            if ($this->oferta->imagen) {
                Storage::disk('public')->delete($this->oferta->imagen);
            }

            // Crear nombre personalizado para la nueva imagen
            $fileName = 'imagen_' . str_replace(['í', 'ñ', ' '], ['i', 'n', '_'], $this->nombre) . '.' . $this->imagen->extension();

            // Guardar la imagen con el nombre personalizado
            $data['imagen'] = $this->imagen->storeAs('ofertas_imagenes', $fileName, 'public');
        }
        // Si solo cambia el nombre, renombrar la imagen sin subir una nueva
        elseif ($this->oferta->nombre !== $this->nombre && $this->oferta->imagen) {
            $oldPath = $this->oferta->imagen;
            $newPath = 'ofertas_imagenes/imagen_' . str_replace(['í', 'ñ', ' '], ['i', 'n', '_'], $this->nombre) . '.' . pathinfo($oldPath, PATHINFO_EXTENSION);

            Storage::disk('public')->move($oldPath, $newPath);
            $data['imagen'] = $newPath;
        }

        // Solo manejar el archivo si se ha subido uno nuevo
        if ($this->mapa_curricular instanceof TemporaryUploadedFile) {
            // Eliminar archivo anterior si existe
            if ($this->oferta->mapa_curricular) {
                Storage::disk('public')->delete($this->oferta->mapa_curricular);
            }

            // Crear nombre personalizado para el archivo usando el campo 'nombre'
            $fileName = 'mapa_curricular_' . str_replace(['í', 'ñ', ' '], ['i', 'n', '_'], $this->nombre) . '.' . $this->mapa_curricular->extension();

            // Guardar el archivo con el nombre personalizado
            $data['mapa_curricular'] = $this->mapa_curricular->storeAs('mapas_curriculares', $fileName, 'public');
        }

        $this->oferta->update($data);

        // Reiniciar campos y cerrar modal
        $this->reset(['open', 'mapa_curricular', 'imagen']);

        // Emitir evento para actualizar la tabla
        $this->oferta->refresh(); // Refresca la instancia del modelo
        $this->dispatch('ofertaUpdated')->to(OfAdminComponente::class); // Asegura que se emite correctamente
        $this->dispatch('alert', '¡La Oferta se ha Editado Exitosamente!');
    }

    public function render()
    {
        return view('livewire.edit-oferta-modal');
    }
}
