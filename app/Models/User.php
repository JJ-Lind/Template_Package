<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * @mixin Builder
 * @property int    id
 * @property string created_at
 * @property string updated_at
 * @property string last_login
 * @property string name
 * @property string email
 * @property string email_verified_at
 * @property string password
 * @property string remember_token
 * @property string picture
 */
class User extends Authenticatable {

    use HasApiTokens, HasFactory, HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'picture',
        'last_login'
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login' => 'datetime',
    ];

    public static function search($search)
    {
        return empty($search)
            ? static::query()
            : (new User)->where('name', 'LIKE', "%$search%")->orWhere('email', 'LIKE', "%$search%");
    }

    /**
     * Get the path to the profile picture
     *
     * @return string
     */
    public function profilePicture(): string
    {
        return $this->picture
            ? asset("storage/user_avatars/$this->picture")
            : 'https://i.pravatar.cc/200';
    }
}
