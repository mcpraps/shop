<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Image
 *
 * @package App\Models
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class Image extends Model {

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
	 * @return BelongsTo
	 */
	public function gallery(): BelongsTo {
		return $this->belongsTo(Gallery::class);
	}


	/**
	 * @return BelongsTo
	 */
	public function post(): BelongsTo {
		return $this->belongsTo(Post::class);
	}


	/**
	 * @return BelongsTo
	 */
	public function product(): BelongsTo {
		return $this->belongsTo(Product::class);
	}


}
