<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Information
 * 
 * @property int $id
 * @property string $titre
 * @property string $description
 * @property string $images
 * @property int $IdTypeInformation
 * @property int $IdUser
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property TypeInformation $type_information
 * @property User $user
 *
 * @package App\Models
 */
class Information extends Model
{
	protected $table = 'informations';

	protected $casts = [
		'IdTypeInformation' => 'int',
		'IdUser' => 'int'
	];

	protected $fillable = [
		'titre',
		'description',
		'images',
		'IdTypeInformation',
		'IdUser'
	];

	public function type_information()
	{
		return $this->belongsTo(TypeInformation::class, 'IdTypeInformation');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'IdUser');
	}
}
