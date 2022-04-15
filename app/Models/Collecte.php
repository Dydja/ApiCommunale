<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Collecte
 * 
 * @property int $id
 * @property int $montant
 * @property string $reseau
 * @property int $IdProjet
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Projet $projet
 * @property Collection|Participer[] $participers
 *
 * @package App\Models
 */
class Collecte extends Model
{
	protected $table = 'collectes';

	protected $casts = [
		'montant' => 'int',
		'IdProjet' => 'int'
	];

	protected $fillable = [
		'montant',
		'reseau',
		'IdProjet'
	];

	public function projet()
	{
		return $this->belongsTo(Projet::class, 'IdProjet');
	}

	public function participers()
	{
		return $this->hasMany(Participer::class, 'IdCollecte');
	}
}
