<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ProductEventLog
 *
 * @package App\Models
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class ProductEventLog extends Model {

    use HasFactory;

	/**
	 * @var string[] $fillable
	 */
	protected $fillable = [
		'event_type',
		'cookie_id'
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
	public function user(): BelongsTo {
		return $this->belongsTo(User::class);
	}


}
