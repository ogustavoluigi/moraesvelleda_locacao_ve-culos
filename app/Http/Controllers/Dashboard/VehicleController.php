<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\VehicleCategory;
use Inertia\Inertia;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;

class VehicleController extends Controller
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

    public function store(StoreVehicleRequest $request)
    {
        $data = $request->validated();

        $category = VehicleCategory::where('name', $data["category"])->first();
        if (!$category) $category = VehicleCategory::create(['name' => $data["category"]]);

        if ($data["photo"] instanceof UploadedFile) $data["photo"] = $data["photo"]->store('uploads', 'public');

        $data['category_id'] = $category->id;

        $data['status'] = "Disponível";

        Vehicle::create($data);

        return redirect()->route('dashboard.vehicles.index');
    }

    public function update(UpdateVehicleRequest $request, int $id)
    {
        $vehicle = Vehicle::find($id);

        $data = $request->validated();

        if ($data["category"]) {
            $category = VehicleCategory::where('name', $data["category"])->first();
            if (!$category) $category = VehicleCategory::create(['name' => $data["category"]]);

            $data['category_id'] = $category->id;
        }

        if ($data["photo"] instanceof UploadedFile) {
            if ($vehicle->photo) {
                $photoPath = $vehicle->photo;
                if (Storage::disk('public')->exists($photoPath)) Storage::disk('public')->delete($photoPath);
            }

            $data["photo"] = $data["photo"]->store('uploads', 'public');
        } else if ($data["photo"] === null && $vehicle->photo) {
            $photoPath = $vehicle->photo;
            if (Storage::disk('public')->exists($photoPath)) Storage::disk('public')->delete($photoPath);
        } else {
            unset($data["photo"]);
        }

        $vehicle->update($data);

        return redirect()->back();
    }

    public function destroy(int $id): RedirectResponse
    {
        $vehicle = Vehicle::find($id);

        $vehicle->delete();

        return redirect()->back();
    }
}
