<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ProductMove
 *
 * @package App\Models
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class ProductMove extends Model {

    use HasFactory;

	const STATUS_REQUESTED = 1;
	const STATUS_SENT = 2;
	const STATUS_ARRIVED = 3;
	const STATUS_REJECTED = 4;

	/**
	 * @var string[] $fillable
	 */
	protected $fillable = [
		'comment'
	];

	/**
	 * @var int[] $attributes
	 */
	protected $attributes = [
		'status' => self::STATUS_REQUESTED
	];


	/**
	 * @return BelongsTo
	 */
	public function fromStore(): BelongsTo {
		return $this->belongsTo(PhysicalStore::class, "from_store_id");
	}


	/**
	 * @return BelongsTo
	 */
	public function toStore(): BelongsTo {
		return $this->belongsTo(PhysicalStore::class, "to_store_id");
	}


	/**
	 * @return BelongsTo
	 */
	public function productIdentifier(): BelongsTo {
		return $this->belongsTo(ProductIdentifier::class);
	}


	/**
	 * @return BelongsTo
	 */
	public function product(): BelongsTo {
		return $this->belongsTo(Product::class);
	}


	/**
	 * @return BelongsTo
	 */
	public function productVariation(): BelongsTo {
		return $this->belongsTo(ProductVariation::class);
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

