<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ProductVariation
 *
 * @package App\Models
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class ProductVariation extends Model {

    use HasFactory;

	/**
	 * @var string[] $fillable
	 */
	protected $fillable = [
		'value',
		'quantity'
	];


	/**
	 * @return BelongsTo
	 */
	public function product(): BelongsTo {
		return $this->belongsTo(Product::class);
	}


	/**
	 * @return BelongsTo
	 */
	public function productVariationName(): BelongsTo {
		return $this->belongsTo(ProductVariationName::class);
	}


}
