<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Rental;
use Inertia\Inertia;
use Carbon\Carbon;

class RentalController extends Controller
{
    public function index()
    {
        $activeRentals = Rental::where('status', 'Ativa')->where('end_date', '<', Carbon::now())->get();
        foreach ($activeRentals as $activeRental) {
            $activeRental->update(['status' => 'Concluída']);
        }

        $rentals = Rental::with('user', 'vehicle')->paginate(8);

        return Inertia::render('Dashboard/Rentals/Index', compact('rentals'));
    }
}
