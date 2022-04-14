<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Sale
 *
 * @package App\Models
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class Sale extends Model {

    use HasFactory;

	const TYPE_CASH = 1;
	const TYPE_CREDIT_CARD = 2; // ha webshopban vasarol és kartyaval fizet akkor itt ezt kell
	const TYPE_LOAN = 3; // hitel
	const TYPE_TRANSFER = 4;
	const TYPE_COD = 5; // ha webshopban vasarol de utanvetes cash on delivery


	/**
	 * @var string[] $fillable
	 */
	protected $fillable = [
		'type',
		'price',
		'comment'
	];


	/**
	 * @return BelongsTo
	 */
	public function physicalStore(): BelongsTo {
		return $this->belongsTo(PhysicalStore::class);
	}


	/**
	 * @return BelongsTo
	 */
	public function cashRegister(): BelongsTo {
		return $this->belongsTo(CashRegister::class);
	}


	/**
	 * @return BelongsTo
	 */
	public function productIdentifier(): BelongsTo {
		return $this->belongsTo(ProductIdentifier::class);
	}


	/**
	 * @return BelongsTo
	 */
	public function product(): BelongsTo {
		return $this->belongsTo(Product::class);
	}


	/**
	 * @return BelongsTo
	 */
	public function productVariation(): BelongsTo {
		return $this->belongsTo(ProductVariation::class);
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
