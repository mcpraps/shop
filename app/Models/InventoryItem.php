<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class InventoryItem
 *
 * @package App\Models
 * @author SRG Group <dev@srg.hu>
 * @copyright 2022 SRG Group Kft.
 */
class InventoryItem extends Model {

    use HasFactory;

	/**
	 * @var string[] $fillable
	 */
	protected $fillable = [
		'requested_quantity',
		'real_quantity'
	];


	/**
	 * @return BelongsTo
	 */
	public function inventory(): BelongsTo {
		return $this->belongsTo(Inventory::class);
	}


	/**
	 * @return BelongsTo
	 */
	public function product(): BelongsTo {
		return $this->belongsTo(Product::class);
	}


}
