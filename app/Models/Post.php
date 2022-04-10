<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Post
 *
 * @package App\Models
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class Post extends Model {

    use HasFactory;

	/**
	 * @var string[] $fillable
	 */
	protected $fillable = [
		'is_active',
		'title',
		'slug',
		'excerpt',
		'content'
	];

	/**
	 * @var string[] $casts
	 */
	protected $casts = [
		'is_active' => 'boolean'
	];


	/**
	 * @return BelongsTo
	 */
	public function route(): BelongsTo {
		return $this->belongsTo(Route::class);
	}


	/**
	 * @return HasMany
	 */
	public function images(): HasMany {
		return $this->hasMany(Image::class);
	}


}
