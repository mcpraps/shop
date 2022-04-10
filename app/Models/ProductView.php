<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ProductView
 *
 * @package App\Models
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class ProductView extends Model {

    use HasFactory;

	/**
	 * @var string[] $fillable
	 */
	protected $fillable = [
		'count',
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
	public function product(): BelongsTo {
		return $this->belongsTo(Product::class);
	}


}
