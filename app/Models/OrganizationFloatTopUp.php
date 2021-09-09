<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrganizationFloatTopUp
 * 
 * @property int $id
 * @property int $org_id
 * @property float $amount
 * @property string|null $reference_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Organization $organization
 *
 * @package App\Models
 */
class OrganizationFloatTopUp extends Model
{
	protected $table = 'organization_float_top_ups';

	protected $casts = [
		'org_id' => 'int',
		'amount' => 'float'
	];

	protected $fillable = [
		'org_id',
		'amount',
		'reference_id'
	];

	public function organization()
	{
		return $this->belongsTo(Organization::class, 'org_id');
	}
}
