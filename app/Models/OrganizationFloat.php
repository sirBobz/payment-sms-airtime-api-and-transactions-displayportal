<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OrganizationFloat
 * 
 * @property int $id
 * @property int $org_id
 * @property float|null $available_balance
 * @property float|null $current_balance
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Organization $organization
 *
 * @package App\Models
 */
class OrganizationFloat extends Model
{
	use SoftDeletes;
	protected $table = 'organization_floats';

	protected $casts = [
		'org_id' => 'int',
		'available_balance' => 'float',
		'current_balance' => 'float'
	];

	protected $fillable = [
		'org_id',
		'available_balance',
		'current_balance'
	];

	public function organization()
	{
		return $this->belongsTo(Organization::class, 'org_id');
	}
}
