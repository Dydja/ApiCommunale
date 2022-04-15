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
 * Class Domaine
 * 
 * @property int $id
 * @property string $titre
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|PropositionIdee[] $proposition_idees
 *
 * @package App\Models
 */
class Domaine extends Model
{
	use SoftDeletes;
	protected $table = 'domaines';

	protected $fillable = [
		'titre'
	];

	public function proposition_idees()
	{
		return $this->hasMany(PropositionIdee::class, 'IdDomaine');
	}
}
