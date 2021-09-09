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
 * Class AirtimeTransaction
 *
 * @property int $id
 * @property int $status
 * @property int $billing_status
 * @property string|null $reference_name
 * @property string|null $request_id
 * @property int $org_id
 * @property int|null $telco_id
 * @property string $phone_number
 * @property float $amount
 * @property float|null $airtime
 * @property float|null $available_balance
 * @property string|null $third_party_trans_id
 * @property Carbon|null $transaction_time
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
class AirtimeTransaction extends Model
{
	use SoftDeletes;
	protected $table = 'airtime_transactions';

	protected $casts = [
		'status' => 'int',
		'billing_status' => 'int',
		'org_id' => 'int',
		'telco_id' => 'int',
		'amount' => 'float',
		'airtime' => 'float',
		'available_balance' => 'float',
		'result_code' => 'int'
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
		'telco_id',
		'phone_number',
		'amount',
		'airtime',
		'available_balance',
		'third_party_trans_id',
		'transaction_time',
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
