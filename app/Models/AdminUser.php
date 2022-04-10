<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class AdminUser
 *
 * @package App\Models
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class AdminUser extends Authenticatable {

    use HasFactory;

    /**
     * @var string[] $fillable
     */
    protected $fillable = [
        'username',
        'password',
        'email',
        'first_name',
        'last_name',
        'is_active'
    ];

	/**
	 * @var bool[] $attributes
	 */
	protected $attributes = [
		'is_active' => true
	];

	/**
	 * @var array $casts
	 */
	protected $casts = [
		'is_active'     => 'boolean',
		'last_login_at' => 'timestamp',
	];


	/**
	 * @return BelongsToMany
	 */
	public function permissions(): BelongsToMany {
		return $this->belongsToMany(Permission::class);
	}


	/**
	 * @return BelongsToMany
	 */
	public function roles(): BelongsToMany {
		return $this->belongsToMany(Role::class);
	}


	/**
	 * @return BelongsTo
	 */
	public function physicalStore(): BelongsTo {
		return $this->belongsTo(PhysicalStore::class);
	}


	/**
	 * @return HasMany
	 */
	public function sales(): HasMany {
		return $this->hasMany(Sale::class);
	}


	/**
	 * @return HasMany
	 */
	public function calendarNotes(): HasMany {
		return $this->hasMany(CalendarNote::class);
	}


}
