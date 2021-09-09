<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ApiCredential
 * 
 * @property int $id
 * @property int $org_id
 * @property string $consumer_key
 * @property string $consumer_secret
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Organization $organization
 *
 * @package App\Models
 */
class ApiCredential extends Model
{
	use SoftDeletes;
	protected $table = 'api_credentials';

	protected $casts = [
		'org_id' => 'int'
	];

	protected $hidden = [
		'consumer_secret'
	];

	protected $fillable = [
		'org_id',
		'consumer_key',
		'consumer_secret'
	];

	public function organization()
	{
		return $this->belongsTo(Organization::class, 'org_id');
	}
}
