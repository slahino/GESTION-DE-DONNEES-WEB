<?php
//* Le namespace auquel est lié le fichier
namespace application\models;

//* Les use pour ne pas avoir à écrire toujours le chemin complet du namespace
use \Illuminate\Database\Eloquent\Model;

class Commande extends Model {
  protected $table = 'commande';
  protected $primaryKey = 'id';
  public $incrementing = false;   // pas d'auto incrementation
	public $keyType = 'string';		// id sous forme de string
	

  public function carte() {
    return $this->belongsTo('application\models\Carte', 'carte_id');
	}
	
	public function paiement() {
		return $this->hasOne('application\models\Paiement', 'commande_id');
	}

  	public function items()
	{
		// pour une association de * à * 
		return $this->belongsToMany('\application\models\Item', // Table cible
	           						'item_commande', // Table Pivot
	           						'commande_id',  // FK cible de la table pivot
	        						'item_id') //FK assoc 
					->withPivot(['quantite','item_id','commande_id'])->withTrashed();  // récupération des données traités et appeler après dans requête sous pivot()
	}
  
}