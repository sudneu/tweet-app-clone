<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use User;

class Tweet extends Model
{
    use Hasfactory,Notifiable;

    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
