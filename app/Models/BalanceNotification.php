<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BalanceNotification
 * 
 * @property int $id
 * @property int $org_id
 * @property int $sent_status
 * @property int $status
 * @property string $threshold
 * @property string $emails
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Organization $organization
 *
 * @package App\Models
 */
class BalanceNotification extends Model
{
	protected $table = 'balance_notifications';

	protected $casts = [
		'org_id' => 'int',
		'sent_status' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'org_id',
		'sent_status',
		'status',
		'threshold',
		'emails'
	];

	public function organization()
	{
		return $this->belongsTo(Organization::class, 'org_id');
	}
}
