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
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property string $prenom
 * @property string $numero
 * @property string $sexe
 * @property Carbon $date_naissance
 * @property string $lieu_naissance
 * @property int $IdCommune
 * @property int $IdTypeUtilisateur
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property TypeUtilisateur $type_utilisateur
 * @property Commune $commune
 * @property Collection|DemandeExtrait[] $demande_extraits
 * @property Collection|Information[] $information
 * @property Collection|Option[] $options
 * @property Collection|Participer[] $participers
 * @property Collection|Preference[] $preferences
 * @property Collection|Probleme[] $problemes
 * @property Collection|PropositionIdee[] $proposition_idees
 * @property Collection|Reagir[] $reagirs
 * @property Collection|RolePermission[] $role_permissions
 * @property Collection|Sondage[] $sondages
 * @property Collection|Vote[] $votes
 *
 * @package App\Models
 */
class User extends Model
{
	use SoftDeletes;
	protected $table = 'users';

	protected $casts = [
		'IdCommune' => 'int',
		'IdTypeUtilisateur' => 'int'
	];

	protected $dates = [
		'email_verified_at',
		'date_naissance'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'email_verified_at',
		'password',
		'remember_token',
		'prenom',
		'numero',
		'sexe',
		'date_naissance',
		'lieu_naissance',
		'IdCommune',
		'IdTypeUtilisateur'
	];

	public function type_utilisateur()
	{
		return $this->belongsTo(TypeUtilisateur::class, 'IdTypeUtilisateur');
	}

	public function commune()
	{
		return $this->belongsTo(Commune::class, 'IdCommune');
	}

	public function demande_extraits()
	{
		return $this->hasMany(DemandeExtrait::class, 'IdUser');
	}

	public function information()
	{
		return $this->hasMany(Information::class, 'IdUser');
	}

	public function options()
	{
		return $this->hasMany(Option::class, 'IdUser');
	}

	public function participers()
	{
		return $this->hasMany(Participer::class, 'IdUser');
	}

	public function preferences()
	{
		return $this->hasMany(Preference::class, 'IdUser');
	}

	public function problemes()
	{
		return $this->hasMany(Probleme::class, 'IdUser');
	}

	public function proposition_idees()
	{
		return $this->hasMany(PropositionIdee::class, 'IdUser');
	}

	public function reagirs()
	{
		return $this->hasMany(Reagir::class, 'IdUser');
	}

	public function role_permissions()
	{
		return $this->hasMany(RolePermission::class, 'IdUser');
	}

	public function sondages()
	{
		return $this->hasMany(Sondage::class, 'IdUser');
	}

	public function votes()
	{
		return $this->hasMany(Vote::class, 'IdUser');
	}
}
