<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DemandeExtrait
 * 
 * @property int $id
 * @property string $lieu_naissance
 * @property string $date_naissance
 * @property string $piece_cni
 * @property int $copie_extrait
 * @property int $IdUser
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class DemandeExtrait extends Model
{
	protected $table = 'demandeExtraits';

	protected $casts = [
		'copie_extrait' => 'int',
		'IdUser' => 'int'
	];

	protected $fillable = [
		'lieu_naissance',
		'date_naissance',
		'piece_cni',
		'copie_extrait',
		'IdUser'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'IdUser');
	}
}
