<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Class File
 *
 * @package App\Models
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class File extends Model {

    use HasFactory;

	/**
	 * @var array $fillable
	 */
	protected $fillable = [
		'name',
		'description',
		'path',
		'is_default'
	];

	/**
	 * @var false[] $attributes
	 */
	protected $attributes = [
		'is_default' => false,
	];

	/**
	 * @var string[] $casts
	 */
	protected $casts = [
		'is_default' => 'boolean'
	];


	/**
	 * @return MorphTo
	 */
	public function gallery(): MorphTo {
		return $this->morphTo(Gallery::class);
	}


	/**
	 * @return MorphTo
	 */
	public function post(): MorphTo {
		return $this->morphTo(Post::class);
	}


	/**
	 * @return MorphTo
	 */
	public function product(): MorphTo {
		return $this->morphTo(Product::class);
	}


	/**
	 * @return MorphTo
	 */
	public function messageStream(): MorphTo {
		return $this->morphTo(MessageStream::class);
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
