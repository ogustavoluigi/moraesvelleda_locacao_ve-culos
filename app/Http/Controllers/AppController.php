<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\VehicleCategory;

class AppController extends Controller
{
    public function index()
    {
        $vehicleCategories = VehicleCategory::with(['vehicles', 'vehicles.category'])->has('vehicles')->get();

        return Inertia::render('Index', compact('vehicleCategories'));
    }
}
