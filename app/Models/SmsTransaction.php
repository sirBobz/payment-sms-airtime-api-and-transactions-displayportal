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
 * Class SmsTransaction
 *
 * @property int $id
 * @property int $org_id
 * @property int $status
 * @property int $billing_status
 * @property string|null $reference_name
 * @property Carbon $transaction_time
 * @property string $request_id
 * @property int|null $telco_id
 * @property string $phone_number
 * @property string $message
 * @property string $sender_id
 * @property float|null $amount
 * @property float|null $available_balance
 * @property string|null $third_party_trans_id
 * @property int|null $result_code
 * @property string|null $result_desc
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Organization $organization
 * @property Telco|null $telco
 *
 * @package App\Models
 */
class SmsTransaction extends Model
{
	use SoftDeletes;
	protected $table = 'sms_transactions';

	protected $casts = [
		'org_id' => 'int',
		'status' => 'int',
		'billing_status' => 'int',
		'telco_id' => 'int',
		'amount' => 'float',
		'available_balance' => 'float',
		'result_code' => 'int'
	];

	protected $dates = [
		'transaction_time'
	];

	protected $fillable = [
		'org_id',
		'status',
		'billing_status',
		'reference_name',
		'transaction_time',
		'request_id',
		'telco_id',
		'phone_number',
		'message',
		'sender_id',
		'amount',
		'available_balance',
		'third_party_trans_id',
		'result_code',
		'result_desc'
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

	public function telco()
	{
		return $this->belongsTo(Telco::class);
	}
}
