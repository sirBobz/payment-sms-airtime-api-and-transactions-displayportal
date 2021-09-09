<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TelcoPrefix
 * 
 * @property int $id
 * @property string $prefix
 * @property int $telco_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Telco $telco
 *
 * @package App\Models
 */
class TelcoPrefix extends Model
{
	protected $table = 'telco_prefixs';

	protected $casts = [
		'telco_id' => 'int'
	];

	protected $fillable = [
		'prefix',
		'telco_id'
	];

	public function telco()
	{
		return $this->belongsTo(Telco::class);
	}
}
