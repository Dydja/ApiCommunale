<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TypeInformation
 * 
 * @property int $id
 * @property string $titre
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Information[] $information
 * @property Collection|Preference[] $preferences
 *
 * @package App\Models
 */
class TypeInformation extends Model
{
	protected $table = 'type_informations';

	protected $fillable = [
		'titre'
	];

	public function information()
	{
		return $this->hasMany(Information::class, 'IdTypeInformation');
	}

	public function preferences()
	{
		return $this->hasMany(Preference::class, 'IdTypeInformation');
	}
}
