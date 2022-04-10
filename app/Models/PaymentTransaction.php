<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class PaymentTransaction
 *
 * @package App\Models
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class PaymentTransaction extends Model {

    use HasFactory;

	const STATUS_INIT           = 'start';
	const STATUS_TIMEOUT        = 'timeout';
	const STATUS_CANCELLED      = 'cancel';
	const STATUS_NOT_AUTHORIZED = 'fail';
	const STATUS_AUTHORIZED     = 'success';
	const STATUS_FRAUD          = 'back';
	const STATUS_REVERSED       = 'finish';
	const STATUS_REFUND         = 'refund';
	const STATUS_IPN            = 'ipn';
	const STATUS_IPN_FINISHED   = 'finished';

	/**
	 * @var string[] $fillable
	 */
	protected $fillable = [
		'transaction_id',
		'total_price',
		'status'
	];


	/**
	 * @return BelongsTo
	 */
	public function order(): BelongsTo {
		return $this->belongsTo(Order::class);
	}


}
