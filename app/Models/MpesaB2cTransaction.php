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
 * Class MpesaB2cTransaction
 *
 * @property int $id
 * @property int $status
 * @property int $billing_status
 * @property string|null $reference_name
 * @property string $request_id
 * @property int $org_id
 * @property string|null $third_party_trans_id
 * @property Carbon $transaction_time
 * @property float $amount
 * @property string|null $short_code
 * @property string|null $originator_conversation_id
 * @property float|null $org_account_balance
 * @property string $phone_number
 * @property string|null $customer_name
 * @property int $result_code
 * @property string $result_desc
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property float|null $charge
 * @property float|null $B2C_utility_account_available_funds
 * @property float|null $B2C_charges_paid_account_available_funds
 * @property string|null $B2C_recipientIs_registered_customer
 *
 * @property Organization $organization
 *
 * @package App\Models
 */
class MpesaB2cTransaction extends Model
{
	use SoftDeletes;
	protected $table = 'mpesa_b2c_transactions';

	protected $casts = [
		'status' => 'int',
		'billing_status' => 'int',
		'org_id' => 'int',
		'amount' => 'float',
		'org_account_balance' => 'float',
		'result_code' => 'int',
		'charge' => 'float',
		'B2C_utility_account_available_funds' => 'float',
		'B2C_charges_paid_account_available_funds' => 'float'
	];

	protected $dates = [
		'transaction_time'
	];

	protected $fillable = [
		'status',
		'billing_status',
		'reference_name',
		'request_id',
		'org_id',
		'third_party_trans_id',
		'transaction_time',
		'amount',
		'short_code',
		'originator_conversation_id',
		'org_account_balance',
		'phone_number',
		'customer_name',
		'result_code',
		'result_desc',
		'charge',
		'B2C_utility_account_available_funds',
		'B2C_charges_paid_account_available_funds',
		'B2C_recipientIs_registered_customer'
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
}
