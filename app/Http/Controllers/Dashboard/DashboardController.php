<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Admin;
use App\Models\Vehicle;
use App\Models\Rental;

class DashboardController extends Controller
{
    public function index()
    {
        $countUsers = User::count();
        $countAdmins = Admin::count();
        $countVehicles = Vehicle::count();
        $countRentals = Rental::count();

        return Inertia::render('Dashboard/Index', compact('countUsers', 'countAdmins', 'countVehicles', 'countRentals'));
    }
}
