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
 * Class Organization
 * 
 * @property int $id
 * @property string $name
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Account[] $accounts
 * @property Collection|AirtimeTransaction[] $airtime_transactions
 * @property Collection|ApiCredential[] $api_credentials
 * @property Collection|BalanceNotification[] $balance_notifications
 * @property Collection|BillingDetail[] $billing_details
 * @property Collection|CardPayment[] $card_payments
 * @property Collection|ConfirmationWebhook[] $confirmation_webhooks
 * @property Collection|MpesaB2cTransaction[] $mpesa_b2c_transactions
 * @property Collection|MpesaC2bTransaction[] $mpesa_c2b_transactions
 * @property Collection|OrganizationDetail[] $organization_details
 * @property Collection|OrganizationFloatTopUp[] $organization_float_top_ups
 * @property Collection|OrganizationFloat[] $organization_floats
 * @property Collection|SmsTransaction[] $sms_transactions
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Organization extends Model
{
	use SoftDeletes;
	protected $table = 'organizations';

	protected $fillable = [
		'name'
	];

	public function accounts()
	{
		return $this->hasMany(Account::class, 'org_id');
	}

	public function airtime_transactions()
	{
		return $this->hasMany(AirtimeTransaction::class, 'org_id');
	}

	public function api_credentials()
	{
		return $this->hasMany(ApiCredential::class, 'org_id');
	}

	public function balance_notifications()
	{
		return $this->hasMany(BalanceNotification::class, 'org_id');
	}

	public function billing_details()
	{
		return $this->hasMany(BillingDetail::class, 'org_id');
	}

	public function card_payments()
	{
		return $this->hasMany(CardPayment::class, 'org_id');
	}

	public function confirmation_webhooks()
	{
		return $this->hasMany(ConfirmationWebhook::class, 'org_id');
	}

	public function mpesa_b2c_transactions()
	{
		return $this->hasMany(MpesaB2cTransaction::class, 'org_id');
	}

	public function mpesa_c2b_transactions()
	{
		return $this->hasMany(MpesaC2bTransaction::class, 'org_id');
	}

	public function organization_details()
	{
		return $this->hasMany(OrganizationDetail::class, 'org_id');
	}

	public function organization_float_top_ups()
	{
		return $this->hasMany(OrganizationFloatTopUp::class, 'org_id');
	}

	public function organization_floats()
	{
		return $this->hasMany(OrganizationFloat::class, 'org_id');
	}

	public function sms_transactions()
	{
		return $this->hasMany(SmsTransaction::class, 'org_id');
	}

	public function users()
	{
		return $this->hasMany(User::class, 'org_id');
	}
}
