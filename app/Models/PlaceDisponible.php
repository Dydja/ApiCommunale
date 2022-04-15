<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PlaceDisponible
 * 
 * @property int $id
 * @property int $NombrePlaceDisponible
 * @property int $IdParking
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Parking $parking
 *
 * @package App\Models
 */
class PlaceDisponible extends Model
{
	protected $table = 'place_disponibles';

	protected $casts = [
		'NombrePlaceDisponible' => 'int',
		'IdParking' => 'int'
	];

	protected $fillable = [
		'NombrePlaceDisponible',
		'IdParking'
	];

	public function parking()
	{
		return $this->belongsTo(Parking::class, 'IdParking');
	}
}
