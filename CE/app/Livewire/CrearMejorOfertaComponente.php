<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MejorOfertaEducativa;
use App\Models\OfertaEducativa;

class CrearMejorOfertaComponente extends Component
{
    public $open = false;
    public $oferta_educativa_id;

    protected $rules = [
        'oferta_educativa_id' => 'required|exists:ofertas_educativas,id',
    ];

    public function guardar()
    {
        $this->validate();

        $oferta = OfertaEducativa::find($this->oferta_educativa_id);

        MejorOfertaEducativa::create([
            'oferta_educativa_id' => $this->oferta_educativa_id,
            'etapa_inicial' => $oferta->etapa_inicial,
            'etapa_continuidad' => $oferta->etapa_continuidad,
            
        ]);

        $this->reset(['oferta_educativa_id']);
        $this->open = false;

        // Emitir evento para que otros componentes actualicen la información
        $this->dispatch('mejorOfertaGuardada')->to(MejorOfertaComponente::class);
        $this->dispatch('alert', '¡La Oferta se ha creado exitosamente!');
    }

    public function render()
    {
        return view('livewire.crear-mejor-oferta-componente', [
            'ofertasEducativas' => OfertaEducativa::all(),
        ]);
    }
}
