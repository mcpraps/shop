<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Inventory
 *
 * @package App\Models
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class Inventory extends Model {

    use HasFactory;

	/**
	 * @var string[] $fillable
	 */
	protected $fillable = [
		'date'
	];

	/**
	 * @var string[] $casts
	 */
	protected $casts = [
		'date' => 'date'
	];


	/**
	 * @return BelongsTo
	 */
	public function physicalStore(): BelongsTo {
		return $this->belongsTo(PhysicalStore::class);
	}


	/**
	 * @return HasMany
	 */
	public function inventoryItem(): HasMany {
		return $this->hasMany(InventoryItem::class);
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
