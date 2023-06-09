<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Cviebrock\EloquentSluggable\Sluggable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'email',
        'password',
        'phone_no',
        'address',
        'dateofbirth',
        'gender',
        'status',
        'image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function roles()
    // {
    // return $this->belongsToMany('Modules\UserAndRoles\Entities\Role');
    // }

    // public function hasAnyRoles($roles)
    // {
    // if ($this->roles()->whereIn('name', $roles)->first()) {
    // return true;
    // }
    // return false;
    // }

    // public function hasRole($role)
    // {
    // if ($this->roles()->where('name', $role)->first()) {
    // return true;
    // }
    // return false;
    // }

 public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function addresses()
    {
    return $this->hasMany(Modules\BillingAddress\Entities\BillingAddress::class);
    }
}
