<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Message
 *
 * @package App\Models
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class Message extends Model {

    use HasFactory;

	/**
	 * @return BelongsTo
	 */
	public function from(): BelongsTo {
		return $this->belongsTo(AdminUser::class);
	}


	/**
	 * @return BelongsTo
	 */
	public function to(): BelongsTo {
		return $this->belongsTo(AdminUser::class);
	}


	/**
	 * @return HasMany
	 */
	public function messageStream(): HasMany {
		return $this->hasMany(MessageStream::class);
	}


}
