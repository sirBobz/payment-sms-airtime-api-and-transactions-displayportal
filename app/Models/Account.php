<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Account
 * 
 * @property int $id
 * @property int $org_id
 * @property int $service_id
 * @property string $account
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Organization $organization
 * @property Service $service
 * @property Collection|AccountIdCredential[] $account_id_credentials
 * @property Collection|BillingDetail[] $billing_details
 * @property Collection|ValidationWebhook[] $validation_webhooks
 *
 * @package App\Models
 */
class Account extends Model
{
	use SoftDeletes;
	protected $table = 'accounts';

	protected $casts = [
		'org_id' => 'int',
		'service_id' => 'int'
	];

	protected $fillable = [
		'org_id',
		'service_id',
		'account'
	];

	public function organization()
	{
		return $this->belongsTo(Organization::class, 'org_id');
	}

	public function service()
	{
		return $this->belongsTo(Service::class);
	}

	public function account_id_credentials()
	{
		return $this->hasMany(AccountIdCredential::class);
	}

	public function billing_details()
	{
		return $this->hasMany(BillingDetail::class);
	}

	public function validation_webhooks()
	{
		return $this->hasMany(ValidationWebhook::class);
	}
}
