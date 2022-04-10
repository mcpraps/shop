<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Partner
 *
 * @package App\Models
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class Partner extends Model {

    use HasFactory;

	/**
	 * @var string[] $fillable
	 */
	protected $fillable = [
		'name',
		'email',
		'phone',
		'zip_code',
		'city',
		'street',
		'house_number',
		'account_number',
		'tax_number',
	];


	/**
	 * @return HasMany
	 */
	public function outgoingInvoices(): HasMany {
		return $this->hasMany(OutgoingInvoice::class);
	}


}
