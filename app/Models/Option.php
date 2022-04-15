<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Option
 * 
 * @property int $id
 * @property string $libelle
 * @property string $point
 * @property int $IdUser
 * @property int $IdSondage
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property User $user
 * @property Collection|Vote[] $votes
 *
 * @package App\Models
 */
class Option extends Model
{
	protected $table = 'options';

	protected $casts = [
		'IdUser' => 'int',
		'IdSondage' => 'int'
	];

	protected $fillable = [
		'libelle',
		'point',
		'IdUser',
		'IdSondage'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'IdUser');
	}

	public function votes()
	{
		return $this->hasMany(Vote::class, 'IdOption');
	}
}
