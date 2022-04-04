<?php
//* Le namespace auquel est lié le fichier
namespace application\models;

//* Les use pour ne pas avoir à écrire toujours le chemin complet du namespace
use \Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;  

class Carte extends Model {
  protected $table = 'carte';
  protected $primaryKey = 'id';

  public function commandes() {
    return $this->hasMany('application\models\Commande', 'carte_id');
  }
}