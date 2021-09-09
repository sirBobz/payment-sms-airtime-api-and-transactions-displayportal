<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BillingDetail
 * 
 * @property int $id
 * @property int|null $org_id
 * @property int|null $service_id
 * @property int|null $account_id
 * @property string $billing_rate
 * @property string $billing_type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Account|null $account
 * @property Service|null $service
 * @property Organization|null $organization
 *
 * @package App\Models
 */
class BillingDetail extends Model
{
	protected $table = 'billing_details';

	protected $casts = [
		'org_id' => 'int',
		'service_id' => 'int',
		'account_id' => 'int'
	];

	protected $fillable = [
		'org_id',
		'service_id',
		'account_id',
		'billing_rate',
		'billing_type'
	];

	public function account()
	{
		return $this->belongsTo(Account::class);
	}

	public function service()
	{
		return $this->belongsTo(Service::class);
	}

	public function organization()
	{
		return $this->belongsTo(Organization::class, 'org_id');
	}
}
