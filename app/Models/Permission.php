<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laratrust\Models\LaratrustPermission;

/**
 * Class Permission
 *
 * @package App\Models
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class Permission extends LaratrustPermission {

    use HasFactory;

	/**
	 * @var string[] $fillable
	 */
	protected $fillable = [
		'name',
		'slug'
	];


	/**
	 * @return BelongsToMany
	 */
	public function adminUsers(): BelongsToMany {
		return $this->belongsToMany(AdminUser::class);
	}


	/**
	 * @return BelongsToMany
	 */
	public function roles(): BelongsToMany {
		return $this->belongsToMany(Role::class);
	}


}
