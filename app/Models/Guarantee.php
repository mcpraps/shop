<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Guarantee
 *
 * @package App\Models
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class Guarantee extends Model {

    use HasFactory;

	const STATUS_TAKE_BACK = 1;
	const STATUS_SEND_BACK = 2;
	const STATUS_ARRIVED = 3;
	const STATUS_CLIENT_RECEIVE = 4;
	const STATUS_CLIENT_PAY_BACK = 5;

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
		'status' => self::STATUS_TAKE_BACK
	];


	/**
	 * @return BelongsTo
	 */
	public function client(): BelongsTo {
		return $this->belongsTo(Client::class);
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
