<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ProductCategory
 *
 * @package App\Models
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class UserAddress extends Model {

    use HasFactory;

	const TYPE_SHIPPING = 1;
	const TYPE_BILLING = 2;

	/**
	 * @var string[] $fillable
	 */
	protected $fillable = [
		'type',
		'zip_code',
		'city',
		'street',
		'house_number',
	];


	/**
	 * @return BelongsTo
	 */
	public function user(): BelongsTo {
		return $this->belongsTo(User::class);
	}


}
