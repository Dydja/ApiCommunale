<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Probleme
 * 
 * @property int $id
 * @property string $image
 * @property string $commentaire
 * @property string $localisation
 * @property int $IdUser
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Probleme extends Model
{
	use SoftDeletes;
	protected $table = 'problemes';

	protected $casts = [
		'IdUser' => 'int'
	];

	protected $fillable = [
		'image',
		'commentaire',
		'localisation',
		'IdUser'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'IdUser');
	}
}
