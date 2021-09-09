<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CardPayment
 * 
 * @property int $id
 * @property string $status
 * @property string|null $transaction_uuid
 * @property int|null $org_id
 * @property string|null $third_party_request_id
 * @property string|null $signed_date_time
 * @property string|null $reference_number
 * @property string|null $amount
 * @property string|null $bill_to_name
 * @property string|null $bill_to_email
 * @property string|null $bill_to_phone
 * @property string|null $req_card_expiry_date
 * @property string|null $auth_avs_code
 * @property string|null $score_card_issuer
 * @property string|null $card_type_name
 * @property string|null $auth_cavv_result
 * @property string|null $auth_cavv_result_raw
 * @property string|null $auth_response
 * @property string|null $score_device_fingerprint_true_ipaddress_city
 * @property string|null $decision
 * @property string|null $score_device_fingerprint_true_ipaddress_attributes
 * @property string|null $decision_rmsg
 * @property string|null $message
 * @property string|null $score_internet_info
 * @property string|null $req_device_fingerprint_id
 * @property string|null $req_transaction_uuid
 * @property string|null $result_code
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Organization|null $organization
 *
 * @package App\Models
 */
class CardPayment extends Model
{
	protected $table = 'card_payments';

	protected $casts = [
		'org_id' => 'int'
	];

	protected $fillable = [
		'status',
		'transaction_uuid',
		'org_id',
		'third_party_request_id',
		'signed_date_time',
		'reference_number',
		'amount',
		'bill_to_name',
		'bill_to_email',
		'bill_to_phone',
		'req_card_expiry_date',
		'auth_avs_code',
		'score_card_issuer',
		'card_type_name',
		'auth_cavv_result',
		'auth_cavv_result_raw',
		'auth_response',
		'score_device_fingerprint_true_ipaddress_city',
		'decision',
		'score_device_fingerprint_true_ipaddress_attributes',
		'decision_rmsg',
		'message',
		'score_internet_info',
		'req_device_fingerprint_id',
		'req_transaction_uuid',
		'result_code'
	];

	public function organization()
	{
		return $this->belongsTo(Organization::class, 'org_id');
	}
}
