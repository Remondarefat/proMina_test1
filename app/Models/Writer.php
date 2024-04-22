<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Writer extends Authenticatable
{
    use Notifiable ,HasApiTokens;

    protected $guard = 'writer';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
