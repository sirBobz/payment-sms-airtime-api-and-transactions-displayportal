<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DateTimeInterface;

/**
 * Class MpesaC2bTransaction
 *
 * @property int $id
 * @property int $status
 * @property int $billing_status
 * @property int|null $service_id
 * @property string $request_id
 * @property int $org_id
 * @property string|null $third_party_trans_id
 * @property Carbon $transaction_time
 * @property float $amount
 * @property float|null $available_balance
 * @property string $short_code
 * @property string|null $bill_ref_number
 * @property float|null $org_account_balance
 * @property string $phone_number
 * @property string|null $customer_name
 * @property int $result_code
 * @property string $result_desc
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property float|null $charge
 *
 * @property Organization $organization
 * @property Service|null $service
 *
 * @package App\Models
 */
class MpesaC2bTransaction extends Model
{
	use SoftDeletes;
	protected $table = 'mpesa_c2b_transactions';

	protected $casts = [
		'status' => 'int',
		'billing_status' => 'int',
		'service_id' => 'int',
		'org_id' => 'int',
		'amount' => 'float',
		'available_balance' => 'float',
		'org_account_balance' => 'float',
		'result_code' => 'int',
		'charge' => 'float'
	];

	protected $dates = [
		'transaction_time'
	];

	protected $fillable = [
		'status',
		'billing_status',
		'service_id',
		'request_id',
		'org_id',
		'third_party_trans_id',
		'transaction_time',
		'amount',
		'available_balance',
		'short_code',
		'bill_ref_number',
		'org_account_balance',
		'phone_number',
		'customer_name',
		'result_code',
		'result_desc',
		'charge'
	];

        /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

	public function organization()
	{
		return $this->belongsTo(Organization::class, 'org_id');
	}

	public function service()
	{
		return $this->belongsTo(Service::class);
	}
}
