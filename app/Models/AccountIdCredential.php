<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AccountIdCredential
 * 
 * @property int $id
 * @property int $account_id
 * @property string $credentials
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Account $account
 *
 * @package App\Models
 */
class AccountIdCredential extends Model
{
	use SoftDeletes;
	protected $table = 'account_id_credentials';

	protected $casts = [
		'account_id' => 'int'
	];

	protected $fillable = [
		'account_id',
		'credentials'
	];

	public function account()
	{
		return $this->belongsTo(Account::class);
	}
}
