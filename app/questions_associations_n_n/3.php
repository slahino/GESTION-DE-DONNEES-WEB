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
    

//* Commande pour supprimer l'item 3 qui correspond au jambon-beurre
// $deleteItem = Item::find(3);
// $deleteItem->delete();

	$commandes = Commande::with('items')->where('nom_client','=','Aaron McGlynn')
	->get();
	foreach ($commandes as $commande) {
		echo "\nCommande : " . $commande->id . ", Client : " . $commande->nom_client;
		foreach ($commande->items as $item) {
			echo "\nItem : "  . $item->libelle . ", " . $item->tarif .
   				 "\nQuantité : " . $item->pivot->quantite . "\n";
		}

	}	
	