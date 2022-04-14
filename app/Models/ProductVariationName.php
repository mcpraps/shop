<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class ProductVariationName
 *
 * @package App\Models
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class ProductVariationName extends Model {

    use HasFactory;

	/**
	 * @var string[] $fillable
	 */
	protected $fillable = [
		'name',
		'is_protected'
	];

	/**
	 * @var string[] $casts
	 */
	protected $casts = [
		'is_protected' => 'boolean'
	];


	/**
	 * @return HasMany
	 */
	public function productVariations(): HasMany {
		return $this->hasMany(ProductVariation::class);
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
