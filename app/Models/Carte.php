<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Carte
 * 
 * @property int $id
 * @property string $type_service
 * @property string $emplacement
 * @property Carbon|null $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class Carte extends Model
{
	protected $table = 'cartes';

	protected $fillable = [
		'type_service',
		'emplacement'
	];
}
