<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Projet
 * 
 * @property int $id
 * @property string $titre
 * @property string $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Collecte[] $collectes
 *
 * @package App\Models
 */
class Projet extends Model
{
	use SoftDeletes;
	protected $table = 'projets';

	protected $fillable = [
		'titre',
		'description'
	];

	public function collectes()
	{
		return $this->hasMany(Collecte::class, 'IdProjet');
	}
}
