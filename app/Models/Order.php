<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Order
 *
 * @package App\Models
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class Order extends Model {

    use HasFactory;

	const STATUS_CART = 1;
	const STATUS_ORDERED = 2;
	const STATUS_PAYED = 3;
	const STATUS_PROCESSED = 4;
	const STATUS_SHIPPED = 5;
	const STATUS_CANCELLED = 6;

	/**
	 * @var string[] $fillable
	 */
	protected $fillable = [
		'first_name',
		'last_name',
		'total_price',
		'payment_method',
		'shipping_method',
		'status',
		'comment',
	];

	/**
	 * @var int[] $attributes
	 */
	protected $attributes = [
		'status' => self::STATUS_CART
	];


	/**
	 * @return BelongsTo
	 */
	public function userAddress(): BelongsTo {
		return $this->belongsTo(UserAddress::class);
	}


	/**
	 * @return BelongsTo
	 */
	public function user(): BelongsTo {
		return $this->belongsTo(User::class);
	}


	/**
	 * @return BelongsTo
	 */
	public function coupon(): BelongsTo {
		return $this->belongsTo(Coupon::class);
	}


	/**
	 * @return HasMany
	 */
	public function orderItems(): HasMany {
		return $this->hasMany(OrderItem::class);
	}


	/**
	 * @return HasMany
	 */
	public function paymentTransactions(): HasMany {
		return $this->hasMany(PaymentTransaction::class);
	}


}
