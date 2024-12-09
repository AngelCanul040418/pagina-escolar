<?php

namespace App\Livewire;

use App\Models\OfertaEducativa;
use Livewire\Component;
use App\Models\User; // Asegúrate de que el modelo User esté importado

class GraficasUsuarios extends Component
{
    public $horasTotales; // Almacena las horas totales
    public $etiquetas;    // Almacena los nombres de las ofertas (o etiquetas)

    public function mount()
    {
        // Obtén las horas totales y etiquetas de las ofertas
        $ofertas = OfertaEducativa::select('nombre', 'horas_totales')->get();
        $this->horasTotales = $ofertas->pluck('horas_totales'); // Array de horas
        $this->etiquetas = $ofertas->pluck('nombre');          // Array de nombres
    }

    public function render()
    {
        return view('livewire.graficas-usuarios', [
            'horasTotales' => $this->horasTotales,
            'etiquetas' => $this->etiquetas,
        ]);
    }
}
