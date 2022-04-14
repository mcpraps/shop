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

	const VISIBILITY_ALL = 1;
	const VISIBILITY_ME = 2;
	const VISIBILITY_CUSTOM = 3;

	/**
	 * @var string[] $fillable
	 */
	protected $fillable = [
		'text',
		'date',
		'visibility'
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
	public function createdBy(): BelongsTo {
		return $this->belongsTo(AdminUser::class, "created_by");
	}


	/**
	 * @return BelongsTo
	 */
	public function visibleFor(): BelongsTo {
		return $this->belongsTo(AdminUser::class, "visible_for");
	}


	/**
	 * @return BelongsTo
	 */
	public function physicalStore(): BelongsTo {
		return $this->belongsTo(PhysicalStore::class);
	}


}
