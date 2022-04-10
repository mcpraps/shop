<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class OutgoingInvoice
 *
 * @package App\Models
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class OutgoingInvoice extends Model {

    use HasFactory;


	/**
	 * @return BelongsTo
	 */
	public function partner(): BelongsTo {
		return $this->belongsTo(Partner::class);
	}


}
