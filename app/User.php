<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
// use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    // use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // 'name', 'email', 'password',
        'first_name',
        'last_name',
        'email',
        'mobile_number',
        'profile_image',
        'password',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function addEdit($data)
    {
        return User::updateOrCreate(
            ['id' => @$data['id']],
            [
                'first_name' => @$data['first_name'],
                'last_name' => @$data['last_name'],
                'email' => @$data['email'],
                // 'email_verified_at' => @$data['email_verified_at'],
                'mobile_number' => @$data['mobile_number'],
                // 'profile_image' => @$data['profile_image'],
                'password' => @$data['password'],
                'status' => @$data['status']
            ]
        );
    }

    public function getJWTIdentifier(){
        return $this->getKey();
    }

    public function getJWTCustomClaims(){
        return [];
    }
}
