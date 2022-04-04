<?php
//* Le namespace auquel est lié le fichier
namespace application\models;

//* Les use pour ne pas avoir à écrire toujours le chemin complet du namespace
use \Illuminate\Database\Eloquent\Model;

class Paiement extends Model {
  protected $table = 'ref_paiement';
  protected $primaryKey = 'id';

  
}