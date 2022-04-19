<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Notification
 *
 * @package App\Models
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class Notification extends Model {

    use HasFactory;

	/**
	 * @var string[] $fillable
	 */
	protected $fillable = [
		'text'
	];

	/**
	 * @var string[] $casts
	 */
	protected $casts = [
		'is_read' => 'boolean'
	];

	/**
	 * @var false[] $attributes
	 */
	protected $attributes = [
		'is_read' => false
	];


	/**
	 * @return BelongsTo
	 */
	public function to(): BelongsTo {
		return $this->belongsTo(AdminUser::class, "to_id");
	}


}
