<?php

namespace App\Http\Controllers;

use laravel\framework\src\Illuminate\Http\Request;
use laravel\framework\src\Illuminate\Validations\Rules\Unique;
use App\Models\User;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show', [
            'user' => $user,
        ]);
    }

    public function edit(User $user)
    {
        // abort_if($user->isNot(current_user()), 404);

        // $this->authorize('edit', $user->username);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'username' => ['string', 'required', 'max:255', 'alpha-dash' ],//Rule::unique('users')->ignore($user) couldn't be used as the path given is not responding.
            'name' => ['string', 'required', 'max:255'],
            'avatar' => ['file'],
            'email' => ['string', 'required', 'email', 'max:255'],//Rule::unique('users')->ignore($user) couldn't be used as the path given is not responding.
            'password' => ['string', 'min:8', 'max:255', 'confirmed',],
        ]);
            
        if(request('avatar')){
            $attributes['avatar'] = request('avatar')->store('avatars');
        }
        
        $user->update($attributes);

        return redirect($user->path());
    }
}
