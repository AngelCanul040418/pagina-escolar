<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfertaEducativa extends Model
{
    use HasFactory;

    protected $table = 'ofertas_educativas';

    protected $fillable = [
        'nombre',
        'etapa_inicial',
        'duracion_cuatri_in',
        'etapa_continuidad',
        'duracion_cuatri_con',
        'horas_totales',
        'creditos_totales',
        'duracion_total_programa',
        'mapa_curricular',
        'imagen'
    ];

    public function cuatriIns()
    {
        return $this->hasMany(CuatriIn::class);
    }

    public function cuatriCons()
    {
        return $this->hasMany(CuatriCon::class);
    }
}
