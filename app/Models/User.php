<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Tweet as Tweet;
use App\Traits\Followable as Followable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Followable;

    protected $fillable = [
        'username',
        'name',
        'avatar',
        'email',
        'password',
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute($value)
    {
        return asset($value ?? '/images/avatar.jpg');
    }

    public function getPasswordAttribute($value)
    {
        return $this->attributes['password'] = bcrypt($value);
    }    
    
    public function timeline()
    {
        //include all of the user's tweets
        //as well as the tweets of everyone
        //they follow... in descending order by data.

        $friends = $this->follows()->pluck('id');       

        return Tweet::whereIn('user_id', $friends)
                ->orWhere('user_id', $this->id)
                ->latest()->get();
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    public function path($append="")
    {
        $path = route('profile', $this->username);

        return $append ? "{$path}/{$append}" : $path;
    }

    // public function getRouteKeyName()    
    // {
    //     return 'name';
    // }
}
