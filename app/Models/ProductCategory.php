<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class ProductCategory
 *
 * @package App\Models
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class ProductCategory extends Model {

    use HasFactory;

	/**
	 * @var string[] $fillable
	 */
	protected $fillable = [
		'name',
		'slug',
		'order',
		'hide_from_shop'
	];

	/**
	 * @var string[] $casts
	 */
	protected $casts = [
		'hide_from_shop' => 'boolean'
	];


	/**
	 * @return BelongsTo
	 */
	public function parentCategory(): BelongsTo {
		return $this->belongsTo(ProductCategory::class, "parent_id");
	}


	/**
	 * @return HasMany
	 */
	public function childrenCategories(): HasMany {
		return $this->hasMany(ProductCategory::class, "parent_id", "id");
	}


	/**
	 * @return BelongsToMany
	 */
	public function products(): BelongsToMany {
		return $this->belongsToMany(Product::class);
	}


}
