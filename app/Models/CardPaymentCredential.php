<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CardPaymentCredential
 * 
 * @property int $id
 * @property int|null $org_id
 * @property string $access_key
 * @property string|null $profile_id
 * @property string $key_secret
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class CardPaymentCredential extends Model
{
	protected $table = 'card_payment_credentials';

	protected $casts = [
		'org_id' => 'int'
	];

	protected $hidden = [
		'key_secret'
	];

	protected $fillable = [
		'org_id',
		'access_key',
		'profile_id',
		'key_secret'
	];
}
