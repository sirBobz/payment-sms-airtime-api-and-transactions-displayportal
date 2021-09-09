<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ValidationWebhook
 * 
 * @property int $id
 * @property int $account_id
 * @property string $validation_url
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Account $account
 *
 * @package App\Models
 */
class ValidationWebhook extends Model
{
	use SoftDeletes;
	protected $table = 'validation_webhooks';

	protected $casts = [
		'account_id' => 'int'
	];

	protected $fillable = [
		'account_id',
		'validation_url'
	];

	public function account()
	{
		return $this->belongsTo(Account::class);
	}
}
