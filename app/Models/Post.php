<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

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
	 * @return MorphMany
	 */
	public function images(): MorphMany {
		return $this->morphMany(File::class,'owner');
	}


	/**
	 * @return BelongsTo
	 */
	public function createdBy(): BelongsTo {
		return $this->belongsTo(AdminUser::class, "created_by");
	}


	/**
	 * @return BelongsTo
	 */
	public function updatedBy(): BelongsTo {
		return $this->belongsTo(AdminUser::class, "updated_by");
	}


}
