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
 * Class Telco
 * 
 * @property int $id
 * @property string $name
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|AirtimeServiceCredential[] $airtime_service_credentials
 * @property Collection|AirtimeTransaction[] $airtime_transactions
 * @property Collection|SmsTransaction[] $sms_transactions
 * @property Collection|TelcoPrefix[] $telco_prefixes
 *
 * @package App\Models
 */
class Telco extends Model
{
	use SoftDeletes;
	protected $table = 'telcos';

	protected $fillable = [
		'name'
	];

	public function airtime_service_credentials()
	{
		return $this->hasMany(AirtimeServiceCredential::class);
	}

	public function airtime_transactions()
	{
		return $this->hasMany(AirtimeTransaction::class);
	}

	public function sms_transactions()
	{
		return $this->hasMany(SmsTransaction::class);
	}

	public function telco_prefixes()
	{
		return $this->hasMany(TelcoPrefix::class);
	}
}
