<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Route
 *
 * @package App\Models
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class Route extends Model {

    use HasFactory;

	const TYPE_STATIC = 1;
	const TYPE_GALLERY = 2;
	const TYPE_CONTACT = 3;
	const TYPE_BLOG = 4;

	/**
	 * @var string[] $fillable
	 */
	protected $fillable = [
		'title',
		'slug',
		'type',
		'order',
		'meta_title',
		'meta_description',
		'meta_keywords'
	];


	/**
	 * @return HasOne
	 */
	public function staticContents(): HasOne {
		return $this->hasOne(StaticContent::class);
	}


	/**
	 * @return HasOne
	 */
	public function galleries(): HasOne {
		return $this->hasOne(Gallery::class);
	}


	/**
	 * @return HasOne
	 */
	public function posts(): HasOne {
		return $this->hasOne(Post::class);
	}


}
