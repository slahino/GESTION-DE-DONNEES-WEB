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
    

	$commande = Commande::with('items')->where('carte_id','=',10)->first();

	$commande->items()->updateExistingPivot(6, ['quantite'=>27] );
	
	echo "\n\n         L' item a bien été modifié !\n";