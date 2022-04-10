<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class CashRegister
 *
 * @package App\Models
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class CashRegister extends Model {

    use HasFactory;

	/**
	 * @var string[] $fillable
	 */
	protected $fillable = [
		'name'
	];


	/**
	 * @return BelongsTo
	 */
	public function physicalStore(): BelongsTo {
		return $this->belongsTo(PhysicalStore::class);
	}


	/**
	 * @return HasMany
	 */
	public function cashRegisterNotes(): HasMany {
		return $this->hasMany(CashRegisterNotes::class);
	}


	/**
	 * @return HasMany
	 */
	public function sales(): HasMany {
		return $this->hasMany(Sale::class);
	}


}
