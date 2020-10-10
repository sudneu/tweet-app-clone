<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show', compact('user'));
    }

    public function edit(User $user)
    {
        // abort_if($user->isNot(current_user()), 404);

        $this->authorize('edit', $user);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'username' => ['string', 'required', 'max:255', 'alpha-dash', Rule::unique('users')->ignore($user),],
            'name' => ['string', 'required', 'email', 'max:255'],
            'email' => ['string', 'required', 'email', 'max:255', Rule::unique('users')->ignore($user),],
            'password' => ['string', 'required', 'min:8', 'max:255', 'confirmed',],
        ]);

        $user->update($attributes);

        return redirect($user->path());
    }
}
