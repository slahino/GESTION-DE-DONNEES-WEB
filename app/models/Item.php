<?php
//* Le namespace auquel est lié le fichier
namespace application\models;


//* Les use pour ne pas avoir à écrire toujours le chemin complet du namespace

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model {
	use SoftDeletes;

  protected $table = 'item';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $dates = ['deleted_at'];


	public function commandes()
	{
		return $this->belongsToMany('\application\models\Commande',
	           						'item_commande',
	           						'item_id',
	        						'commande_id')
					->withPivot(['quantite','item_id','commande_id']);
	}
}