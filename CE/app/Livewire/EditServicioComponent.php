<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Servicios;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditServicioComponent extends Component
{
    use WithFileUploads;

    public $open = false;
    public $servicio;
    public $nombre, $tipo_de_servicio;
    public $contenido;
    public $path;
    public $newImage;

    public function mount(Servicios $servicio)
    {
        $this->servicio = $servicio;
    }

    protected $rules = [
        'nombre' => 'required',
        'tipo_de_servicio' => 'required',
        'contenido' => 'required',
    ];

    protected $listeners = ['editservicio' => 'loadservicio'];

    public function loadservicio($servicioId)
    {
        $servicio = Servicios::find($servicioId);
        if ($servicio) {
            $this->servicio = $servicio;
            $this->nombre = $servicio->nombre;
            $this->tipo_de_servicio = $servicio->tipo_de_servicio;
            $this->contenido = $servicio->contenido;
            $this->path = $servicio->imagen ? Storage::url($servicio->imagen) : null;
            $this->open = true;
        }
    }

    // Actualizar la previsualización cuando se seleccione una nueva imagen
    public function updatedNewImage()
    {
        if ($this->newImage) {
            $this->path = $this->newImage->temporaryUrl();
        }
    }

    public function save()
    {
        $this->validate();

        $data = [
            'nombre' => $this->nombre,
            'tipo_de_servicio' => $this->tipo_de_servicio,
            'contenido' => $this->contenido,
        ];

        if ($this->newImage) {
            $imagePath = $this->newImage->store('images', 'public');
            $data['imagen'] = $imagePath;
        }

        $this->servicio->update($data);

        $this->reset(['open', 'newImage']);
        $this->dispatch('servicioUpdated')->to(ServiciosComponent::class);
        $this->dispatch('alert', '¡El servicio se ha editado exitosamente!');
    }

    public function render()
    {
        return view('livewire.edit-servicio-component');
    }
}
