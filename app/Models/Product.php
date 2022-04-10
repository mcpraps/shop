<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Product
 *
 * @package App\Models
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class Product extends Model {

    use HasFactory;

	/**
	 * @var string[] $fillable
	 */
	protected $fillable = [
		'name',
		'short_description',
		'long_description',
		'hide_from_shop',
		'quantity',
		'net_price',
		'gross_price',
		'sale_price'
	];

	/**
	 * @var string[] $casts
	 */
	protected $casts = [
		'hide_from_shop' => 'boolean'
	];


	/**
	 * @return BelongsToMany
	 */
	public function productCategories(): BelongsToMany {
		return $this->belongsToMany(ProductCategory::class);
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
	public function images(): HasMany {
		return $this->hasMany(Image::class);
	}


	/**
	 * @return HasMany
	 */
	public function productVariations(): HasMany {
		return $this->hasMany(ProductVariation::class);
	}


	/**
	 * @return HasMany
	 */
	public function productIdentifiers(): HasMany {
		return $this->hasMany(ProductIdentifier::class);
	}


	/**
	 * @return HasMany
	 */
	public function productViews(): HasMany {
		return $this->hasMany(ProductView::class);
	}


}
