<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Parking
 * 
 * @property int $id
 * @property int $nombre_place
 * @property string $nom_proprietaire
 * @property int $IdCommune
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Commune $commune
 * @property Collection|PlaceDisponible[] $place_disponibles
 *
 * @package App\Models
 */
class Parking extends Model
{
	protected $table = 'parkings';

	protected $casts = [
		'nombre_place' => 'int',
		'IdCommune' => 'int'
	];

	protected $fillable = [
		'nombre_place',
		'nom_proprietaire',
		'IdCommune'
	];

	public function commune()
	{
		return $this->belongsTo(Commune::class, 'IdCommune');
	}

	public function place_disponibles()
	{
		return $this->hasMany(PlaceDisponible::class, 'IdParking');
	}
}
