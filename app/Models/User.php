<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     /**
     * Get User's favorites Videos
     */
    public function favorites()
    {
        return $this->belongsToMany('App\Models\User', 'favorites');
    }

    /**
     * Get Users who downloads this Video
     */
    public function downloads()
    {
        return $this->belongsToMany('App\Models\User', 'downloads');
    }

    /**
     * Who is Admin
     */
    public function scoopeAdmins()
    {
        return $this->User::where('isAdmin', true);
    }
}
