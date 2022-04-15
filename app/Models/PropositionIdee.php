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
 * Class PropositionIdee
 * 
 * @property int $id
 * @property string $description
 * @property int $IdUser
 * @property int $IdDomaine
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * 
 * @property Domaine $domaine
 * @property User $user
 * @property Collection|Reagir[] $reagirs
 *
 * @package App\Models
 */
class PropositionIdee extends Model
{
	use SoftDeletes;
	protected $table = 'proposition_idees';

	protected $casts = [
		'IdUser' => 'int',
		'IdDomaine' => 'int'
	];

	protected $fillable = [
		'description',
		'IdUser',
		'IdDomaine'
	];

	public function domaine()
	{
		return $this->belongsTo(Domaine::class, 'IdDomaine');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'IdUser');
	}

	public function reagirs()
	{
		return $this->hasMany(Reagir::class, 'IdPropositionIdee');
	}
}
