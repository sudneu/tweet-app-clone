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

        // $this->authorize('edit', $user);

        return view('profiles.edit', compact('user'));
    }
}
