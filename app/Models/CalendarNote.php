<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class CalendarNote
 *
 * @package App\Models
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class CalendarNote extends Model {

    use HasFactory;

	/**
	 * @var string[] $fillable
	 */
	protected $fillable = [
		'text',
		'date',
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
	public function adminUser(): BelongsTo {
		return $this->belongsTo(AdminUser::class);
	}


	/**
	 * @return BelongsTo
	 */
	public function physicalStore(): BelongsTo {
		return $this->belongsTo(PhysicalStore::class);
	}


}
