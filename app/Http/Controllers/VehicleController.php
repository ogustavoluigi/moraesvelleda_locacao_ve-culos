<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Inertia\Inertia;
use App\Models\VehicleCategory;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\VehicleRequest;

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

    public function store(VehicleRequest $request)
    {
        $data = $request->validated();

        $category = VehicleCategory::where('name', $data["category"])->first();
        if (!$category) $category = VehicleCategory::create(['name' => $data["category"]]);

        $data["photo"] = $data["photo"]->store('uploads', 'public');

        $data['category_id'] = $category->id;

        $data['status'] = "Disponível";

        Vehicle::create($data);

        return redirect()->back();
    }

    public function update(Request $request, int $id)
    {
        $vehicle = Vehicle::find($id);

        $data = $request->all();

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

            $data["photo"] = null;
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
