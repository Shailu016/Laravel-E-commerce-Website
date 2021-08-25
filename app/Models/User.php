<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Notifications\SlackNotification;

class User extends Authenticatable
{
    use HasRoles,HasFactory, Notifiable;
    

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

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }
    public function orders()
    {
       return $this->hasMany(Order::class);
    }

    public function routeNotificationForSlack($notification)
    {
        return 'https://hooks.slack.com/services/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';
    }
}
