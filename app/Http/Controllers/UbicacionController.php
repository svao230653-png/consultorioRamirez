<?php

namespace App\Http\Controllers;

class UbicacionController extends Controller
{
    public function index()
    {
        $apiKey = config('services.google_maps.key');

        // Cambia estas coordenadas por las reales de tu consultorio
        $latitud = 18.9242;
        $longitud = -99.2216;
        $direccion = 'Consultorio Dental Ramírez';

        return view('ubicacion.index', compact('apiKey', 'latitud', 'longitud', 'direccion'));
    }
}