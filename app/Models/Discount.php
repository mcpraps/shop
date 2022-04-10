<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Discount
 *
 * @package App\Models
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class Discount extends Model {

    use HasFactory;

	/**
	 * @var string[] $fillable
	 */
	protected $fillable = [
		'name',
		'description',
		'discount',
		'active_from',
		'active_to'
	];

	/**
	 * @var string[] $casts
	 */
	protected $casts = [
		'active_from' => 'datetime',
		'active_to' => 'datetime'
	];


	/**
	 * @return BelongsToMany
	 */
	public function products(): BelongsToMany {
		return $this->belongsToMany(Product::class);
	}


}
