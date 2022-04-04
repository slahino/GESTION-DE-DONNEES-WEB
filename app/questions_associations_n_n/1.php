<?php

//* On appelle l'autoloader (généré grâce au fichier composer.json et la commande "composer install"
require_once __DIR__ . '/../../vendor/autoload.php';

use \application\models\Carte;
use \application\models\Commande;
use \application\models\Item;
use \application\models\Paiement;

$config = parse_ini_file('../conf/conf.ini');

    // une instance de connexion
    $db = new Illuminate\Database\Capsule\Manager();

    $db->addConnection( $config ); // configuration avec nos paramètres
    $db->setAsGlobal();            // rendre la connexion visible dans tout le projet
    $db->bootEloquent();           // établir la connexion
    

//* Commande pour supprimer l'item 2 qui correspond au tacos mex
//$deleteItem = Item::find(2);
//$deleteItem->delete();

$requete = Commande::select()
			->where('id', '=', '000b2a0b-d055-4499-9c1b-84441a254a36');
$commande = $requete->first();
$item = $commande->items()->get();

foreach ($item as $v) {
  echo "\nCommande n° " . $commande->id . "
  		\nItem : "  . $v->libelle . ", " . $v->tarif. "\n\n";
}