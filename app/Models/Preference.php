<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Preference
 * 
 * @property int $id
 * @property int $IdUser
 * @property int $IdTypeInformation
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property User $user
 * @property TypeInformation $type_information
 *
 * @package App\Models
 */
class Preference extends Model
{
	protected $table = 'preferences';

	protected $casts = [
		'IdUser' => 'int',
		'IdTypeInformation' => 'int'
	];

	protected $fillable = [
		'IdUser',
		'IdTypeInformation'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'IdUser');
	}

	public function type_information()
	{
		return $this->belongsTo(TypeInformation::class, 'IdTypeInformation');
	}
}
