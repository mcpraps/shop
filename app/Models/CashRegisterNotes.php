<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class CashRegisterNotes
 *
 * @package App\Models
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class CashRegisterNotes extends Model {

    use HasFactory;

	/**
	 * @var string[] $fillable
	 */
	protected $fillable = [
		'date',
		'open',
		'20000',
		'10000',
		'5000',
		'2000',
		'1000',
		'500',
		'200',
		'100',
		'50',
		'20',
		'10',
		'5',
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
	public function cashRegister(): BelongsTo {
		return $this->belongsTo(CashRegister::class);
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
