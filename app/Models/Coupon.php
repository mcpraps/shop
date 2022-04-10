<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Coupon
 *
 * @package App\Models
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class Coupon extends Model {

    use HasFactory;

	/**
	 * @var string[] $fillable
	 */
	protected $fillable = [
		'code',
		'discount',
		'valid_from',
		'valid_to'
	];

	/**
	 * @var string[] $casts
	 */
	protected $casts = [
		'valid_from' => 'datetime',
		'valid_to' => 'datetime'
	];


	/**
	 * @return BelongsTo
	 */
	public function orders(): BelongsTo {
		return $this->belongsTo(Order::class);
	}


}
