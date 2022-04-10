<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class ProductCategory
 *
 * @package App\Models
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class User extends Authenticatable {

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
		'username',
	    'password',
	    'is_active',
	    'first_name',
	    'last_name',
        'email',
        'phone',
    ];

	/**
	 * @var false[] $attributes
	 */
	protected $attributes = [
		'is_active' => false
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
	    'is_active' => 'boolean'
    ];


	/**
	 * @return HasMany
	 */
	public function userAddresses(): HasMany {
		return $this->hasMany(UserAddress::class);
	}


	/**
	 * @return HasMany
	 */
	public function orders(): HasMany {
		return $this->hasMany(Order::class);
	}


}
