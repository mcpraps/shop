<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Offer
 *
 * @package App\Models
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class Offer extends Model {

    use HasFactory;

	/**
	 * @var array $fillable
	 */
	protected $fillable = [
		'name',
		'customer_name',
		'customer_phone',
		'customer_address',
		'customer_email',
		'valid_to',
		'comment',
		'discount'
	];

	/**
	 * @var string[] $casts
	 */
	protected $casts = [
		'valid_to' => 'date'
	];


	/**
	 * @return BelongsToMany
	 */
	public function products(): BelongsToMany {
		return $this->belongsToMany(Product::class);
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
