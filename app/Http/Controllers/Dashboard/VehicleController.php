<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\VehicleController as VehicleControllerBase;
use App\Models\Vehicle;
use App\Models\VehicleCategory;
use Inertia\Inertia;

class VehicleController extends VehicleControllerBase
{
    public function index()
    {
        $vehicles = Vehicle::with('category')->paginate(8);

        return Inertia::render("Dashboard/Vehicles/Index", compact("vehicles"));
    }

    public function create()
    {
        $categories = VehicleCategory::get();

        return Inertia::render("Dashboard/Vehicles/Create", compact("categories"));
    }

    public function edit(int $id)
    {
        $categories = VehicleCategory::get();

        $vehicle = Vehicle::with('category')->find($id);

        return Inertia::render("Dashboard/Vehicles/Edit", compact("vehicle", "categories"));
    }
}
