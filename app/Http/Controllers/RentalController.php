<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RentalRequest;
use Inertia\Inertia;
use App\Models\Rental;
use App\Models\User;
use App\Models\Vehicle;

class RentalController extends Controller
{
    public function index()
    {
        $authUser = auth()->user();
        if ($authUser instanceof User) $rentals = $authUser->activeRentals()->with('vehicle', 'vehicle.category')->get();

        return Inertia::render('Account/Rentals/Index', compact('rentals'));
    }

    public function store(RentalRequest $request)
    {
        $data = $request->validated();

        $vehicleId = $data["vehicle_id"];

        $vehicle = Vehicle::find($vehicleId);

        $authUserId = auth()->user()->id;

        $data['user_id'] = $authUserId;
        $data['vehicle_id'] = $vehicleId;
        $data['cost'] = $vehicle->rental_cost;
        $data['status'] = 'Ativa';

        Rental::create($data);

        return redirect()->route('account.rentals.index')->with('message', 'Veículo reservado com sucesso');
    }

    public function update(Request $request, int $id)
    {
        $data = $request->all();

        $rental = Rental::find($id);

        $rental->update($data);

        return redirect()->route('vehicles.index')->with('message', 'Reservado cancelada com sucesso');
    }
}
