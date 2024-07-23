<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Overtrue\LaravelFollow\Traits\Followable;
use Overtrue\LaravelFollow\Traits\Follower;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Follower, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];
    protected $table = 'users';

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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getStatusAttribute($status){
        return $status ? 'فعال' : 'غیرفعال';
    }

    public function getProviderNameAttribute($provider_name){
        switch ($provider_name){
            case 'manual' :
                $provider_name = 'دستی';
                break;
            case 'manualByAdmin' :
                $provider_name = 'دستی توسظ ادمین';
                break;
            case 'google' :
                $provider_name = 'گوگل';
                break;
        }
        return $provider_name;
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
