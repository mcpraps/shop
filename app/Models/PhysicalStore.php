<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
	public function adminUsers(): HasMany {
		return $this->hasMany(AdminUser::class);
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


}
