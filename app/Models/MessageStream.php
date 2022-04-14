<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * Class Message
 *
 * @package App\Models
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class MessageStream extends Model {

    use HasFactory;

	/**
	 * @var string[] $fillable
	 */
	protected $fillable = [
		'subject',
		'message'
	];


	/**
	 * @return BelongsTo
	 */
	public function message(): BelongsTo {
		return $this->belongsTo(Message::class);
	}


	/**
	 * @return MorphMany
	 */
	public function attachments(): MorphMany {
		return $this->morphMany(File::class,'owner');
	}


}
