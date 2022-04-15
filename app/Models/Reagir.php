<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Reagir
 * 
 * @property int $id
 * @property string $description
 * @property int $IdUser
 * @property int $IdPropositionIdee
 * @property bool $like
 * @property bool $dislike
 * @property bool $signaler
 * @property int $created_at
 * @property string|null $deleted_at
 * 
 * @property User $user
 * @property PropositionIdee $proposition_idee
 *
 * @package App\Models
 */
class Reagir extends Model
{
	use SoftDeletes;
	protected $table = 'reagir';
	public $timestamps = false;

	protected $casts = [
		'IdUser' => 'int',
		'IdPropositionIdee' => 'int',
		'like' => 'bool',
		'dislike' => 'bool',
		'signaler' => 'bool',
		'created_at' => 'int'
	];

	protected $fillable = [
		'description',
		'IdUser',
		'IdPropositionIdee',
		'like',
		'dislike',
		'signaler'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'IdUser');
	}

	public function proposition_idee()
	{
		return $this->belongsTo(PropositionIdee::class, 'IdPropositionIdee');
	}
}
