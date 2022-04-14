<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 *
 * @package App\Models
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class Product extends Model {

	use SoftDeletes;
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
		'sale_price',
		'warranty_month',
		'order',
		'disable_review'
	];

	/**
	 * @var string[] $casts
	 */
	protected $casts = [
		'hide_from_shop' => 'boolean',
		'disable_review' => 'boolean',
	];

	/**
	 * @var false[] $attributes
	 */
	protected $attributes = [
		'disable_review' => false,
		'hide_from_shop' => false
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
	 * @return MorphMany
	 */
	public function images(): MorphMany {
		return $this->morphMany(File::class,'type');
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
	public function inventoryItems(): HasMany {
		return $this->hasMany(InventoryItem::class);
	}


	/**
	 * @return HasMany
	 */
	public function productEvents(): HasMany {
		return $this->hasMany(ProductEvent::class);
	}


	/**
	 * @return HasMany
	 */
	public function productEventLogs(): HasMany {
		return $this->hasMany(ProductEventLog::class);
	}


	/**
	 * @return BelongsToMany
	 */
	public function offers(): BelongsToMany {
		return $this->belongsToMany(Offer::class);
	}


	/**
	 * @return BelongsToMany
	 */
	public function discounts(): BelongsToMany {
		return $this->belongsToMany(Discount::class);
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


	/**
	 * @return HasMany
	 */
	public function productReviews(): HasMany {
		return $this->hasMany(ProductReview::class);
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


	/**
	 * @return BelongsTo
	 */
	public function deletedBy(): BelongsTo {
		return $this->belongsTo(AdminUser::class, "deleted_by");
	}


}
