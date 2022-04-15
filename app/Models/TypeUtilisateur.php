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
 * Class TypeUtilisateur
 * 
 * @property int $id
 * @property string $profil
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|RolePermission[] $role_permissions
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class TypeUtilisateur extends Model
{
	use SoftDeletes;
	protected $table = 'type_utilisateurs';

	protected $fillable = [
		'profil'
	];

	public function role_permissions()
	{
		return $this->hasMany(RolePermission::class, 'IdTypeUtilisateur');
	}

	public function users()
	{
		return $this->hasMany(User::class, 'IdTypeUtilisateur');
	}
}
