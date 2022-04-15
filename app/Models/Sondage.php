<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Sondage
 * 
 * @property int $id
 * @property string $description
 * @property int $IdUser
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Sondage extends Model
{
	protected $table = 'sondages';

	protected $casts = [
		'IdUser' => 'int'
	];

	protected $fillable = [
		'description',
		'IdUser'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'IdUser');
	}
}
