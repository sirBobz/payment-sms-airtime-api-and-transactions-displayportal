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
 * Class Service
 * 
 * @property int $id
 * @property string $name
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Account[] $accounts
 * @property Collection|AirtimeServiceCredential[] $airtime_service_credentials
 * @property Collection|BillingDetail[] $billing_details
 * @property Collection|ConfirmationWebhook[] $confirmation_webhooks
 * @property Collection|MpesaC2bTransaction[] $mpesa_c2b_transactions
 *
 * @package App\Models
 */
class Service extends Model
{
	use SoftDeletes;
	protected $table = 'services';

	protected $fillable = [
		'name'
	];

	public function accounts()
	{
		return $this->hasMany(Account::class);
	}

	public function airtime_service_credentials()
	{
		return $this->hasMany(AirtimeServiceCredential::class);
	}

	public function billing_details()
	{
		return $this->hasMany(BillingDetail::class);
	}

	public function confirmation_webhooks()
	{
		return $this->hasMany(ConfirmationWebhook::class);
	}

	public function mpesa_c2b_transactions()
	{
		return $this->hasMany(MpesaC2bTransaction::class);
	}
}
