<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class PhysicalStore
 *
 * @package App\Models
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class PhysicalStore extends Model {

    use HasFactory;

	/**
	 * @var string[] $fillable
	 */
	protected $fillable = [
		'name',
		'zip_code',
		'city',
		'street',
		'house_number',
	];


	/**
	 * @return HasMany
	 */
	public function products(): HasMany {
		return $this->hasMany(Product::class);
	}


	/**
	 * @return HasMany
	 */
	public function productCategories(): HasMany {
		return $this->hasMany(ProductCategory::class);
	}


	/**
	 * @return HasMany
	 */
	public function calendarNotes(): HasMany {
		return $this->hasMany(CalendarNote::class);
	}


	/**
	 * @return HasMany
	 */
	public function cashRegister(): HasMany {
		return $this->hasMany(CashRegister::class);
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
	public function inventories(): HasMany {
		return $this->hasMany(Inventory::class);
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
