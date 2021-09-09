<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ConfirmationWebhook
 * 
 * @property int $id
 * @property int $org_id
 * @property int $service_id
 * @property string $url
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Organization $organization
 * @property Service $service
 *
 * @package App\Models
 */
class ConfirmationWebhook extends Model
{
	use SoftDeletes;
	protected $table = 'confirmation_webhooks';

	protected $casts = [
		'org_id' => 'int',
		'service_id' => 'int'
	];

	protected $fillable = [
		'org_id',
		'service_id',
		'url'
	];

	public function organization()
	{
		return $this->belongsTo(Organization::class, 'org_id');
	}

	public function service()
	{
		return $this->belongsTo(Service::class);
	}
}
