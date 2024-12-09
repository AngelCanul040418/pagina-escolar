<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\OfertaEducativa;
use App\Models\Servicios;
use App\Models\User;
use App\Models\Image;


class DashboardCounter extends Component
{
    public $ofertasCount;
    public $serviciosCount;
    public $usersCount;
    public $imageCount;
    public function mount()
    {
        // Obtener los conteos iniciales
        $this->ofertasCount = OfertaEducativa::count();
        $this->serviciosCount = Servicios::count();
        $this->usersCount = User::count();
        $this->imageCount = Image::count();
        
    }


    public function render()
    {
    
        return view('livewire.dashboard-counter');
    }
}
