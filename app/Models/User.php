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
        'name',
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

    public function getAvatarAttribute()
    {
        return "https://i.private.cc/40?u=". $this->email;
    }

    public function follow(User $user){
        return $this->follows()->save($user);
    }

    public function unfollow(User $user){
        return $this->follows()->detach($user);
    }

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    public function following(User $user)
    {
        return $this->follows()
                ->where('following_user_id', $user->id)
                ->exists();
    }

    public function toggleFollow(User $user)
    {
        if($this->following($user)){
            return $this->unfollow($user);
        }

        return $this->follow($user);
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
        $path = route('profile', $this->name);

        return $append ? "{$path}/{$append}" : $path;
    }

    // public function getRouteKeyName()    
    // {
    //     return 'name';
    // }
}
