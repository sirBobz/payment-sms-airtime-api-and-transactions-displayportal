<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OrganizationDetail
 * 
 * @property int $id
 * @property int $org_id
 * @property string|null $location
 * @property string|null $website
 * @property string|null $office_email
 * @property string|null $office_mobile
 * @property string|null $top_up_code
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Organization $organization
 *
 * @package App\Models
 */
class OrganizationDetail extends Model
{
	use SoftDeletes;
	protected $table = 'organization_details';

	protected $casts = [
		'org_id' => 'int'
	];

	protected $fillable = [
		'org_id',
		'location',
		'website',
		'office_email',
		'office_mobile',
		'top_up_code'
	];

	public function organization()
	{
		return $this->belongsTo(Organization::class, 'org_id');
	}
}
