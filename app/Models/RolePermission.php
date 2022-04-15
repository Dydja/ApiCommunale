<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RolePermission
 * 
 * @property int $id
 * @property int $IdUser
 * @property int $IdTypeUtilisateur
 * @property Carbon $created_at
 * @property Carbon $update_at
 * 
 * @property User $user
 * @property TypeUtilisateur $type_utilisateur
 *
 * @package App\Models
 */
class RolePermission extends Model
{
	protected $table = 'role_permissions';
	public $timestamps = false;

	protected $casts = [
		'IdUser' => 'int',
		'IdTypeUtilisateur' => 'int'
	];

	protected $dates = [
		'update_at'
	];

	protected $fillable = [
		'IdUser',
		'IdTypeUtilisateur',
		'update_at'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'IdUser');
	}

	public function type_utilisateur()
	{
		return $this->belongsTo(TypeUtilisateur::class, 'IdTypeUtilisateur');
	}
}
