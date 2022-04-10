<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class OrderItem
 *
 * @package App\Models
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class OrderItem extends Model {

    use HasFactory;


	/**
	 * @return BelongsTo
	 */
	public function order(): BelongsTo {
		return $this->belongsTo(Order::class);
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
	public function productItemIdentifier(): BelongsTo {
		return $this->belongsTo(ProductIdentifier::class);
	}


}
