<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Response;

class UserController extends Controller
{
    public function index(): Response
    {
        $users = User::paginate(8);

        return Inertia::render('Dashboard/Users/Index', compact('users'));
    }

    public function edit(int $id): Response
    {
        $user = User::find($id);

        return Inertia::render("Dashboard/Users/Edit", compact("user"));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $user = User::find($id);

        $user->fill($request->all());

        $user->save();

        return redirect()->route('dashboard.users.edit', $id);
    }

    public function passwordUpdate(Request $request, int $id): RedirectResponse
    {
        $user = User::find($id);

        $validated = $request->validate([
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back();
    }

    public function destroy(int $id): RedirectResponse
    {
        $user = User::find($id);

        $user->delete();

        return redirect()->route('dashboard.users.index');
    }
}
