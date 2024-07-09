<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Inertia\Inertia;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::with('category')->paginate(12);

        return Inertia::render("Vehicles/Index", compact("vehicles"));
    }

    public function show(string $slug)
    {
        $vehicle = Vehicle::with('category')->where('slug', $slug)->first();

        return Inertia::render("Vehicles/Show", compact("vehicle"));
    }
}
