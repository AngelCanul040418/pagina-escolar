<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MejorOfertaEducativa;

class DashboardMejoresOfertas extends Component
{
    public $ultimaoferta;

    public function mount()
    {
        // Cargar la relación 'ofertaEducativa' junto con la última oferta
        $this->ultimaoferta = MejorOfertaEducativa::with('ofertaEducativa')->latest()->first();
    }

    public function render()
    {
        return view('livewire.dashboard-mejores-ofertas', [
            'ultimaoferta' => $this->ultimaoferta,
        ]);
    }
}

