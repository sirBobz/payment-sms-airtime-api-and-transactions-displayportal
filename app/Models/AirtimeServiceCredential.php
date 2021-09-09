<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AirtimeServiceCredential
 * 
 * @property int $id
 * @property int $service_id
 * @property int|null $telco_id
 * @property string $credentials
 * @property bool $status
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Telco|null $telco
 * @property Service $service
 *
 * @package App\Models
 */
class AirtimeServiceCredential extends Model
{
	use SoftDeletes;
	protected $table = 'airtime_service_credentials';

	protected $casts = [
		'service_id' => 'int',
		'telco_id' => 'int',
		'status' => 'bool'
	];

	protected $fillable = [
		'service_id',
		'telco_id',
		'credentials',
		'status'
	];

	public function telco()
	{
		return $this->belongsTo(Telco::class);
	}

	public function service()
	{
		return $this->belongsTo(Service::class);
	}
}
