<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Admin;

class DashboardController extends Controller
{
    public function index()
    {
        $countUsers = User::count();
        $countAdmins = Admin::count();

        return Inertia::render('Dashboard/Index', compact('countUsers', 'countAdmins'));
    }
}
