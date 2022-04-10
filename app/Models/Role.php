<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Role
 *
 * @package App\Models
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class Role extends Model {

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
	public function permissions(): BelongsToMany {
		return $this->belongsToMany(Permission::class);
	}


}
