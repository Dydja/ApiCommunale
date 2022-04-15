<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Participer
 * 
 * @property int $id
 * @property int $IdCollecte
 * @property int $IdUser
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collecte $collecte
 * @property User $user
 *
 * @package App\Models
 */
class Participer extends Model
{
	protected $table = 'participer';

	protected $casts = [
		'IdCollecte' => 'int',
		'IdUser' => 'int'
	];

	protected $fillable = [
		'IdCollecte',
		'IdUser'
	];

	public function collecte()
	{
		return $this->belongsTo(Collecte::class, 'IdCollecte');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'IdUser');
	}
}
