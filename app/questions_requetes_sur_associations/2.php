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

$commandes = Commande::where('etat', '>=', '0')->where('montant', '>', '20.0')->whereHas('carte', function($q) {
  $q->where('id', '=', '28');
})->get();
foreach ($commandes as $v ) {
	echo "\nLes commandes avec un état supérieur ou égal à 0 et un montant supérieur à 20.0, pour la carte dont  l'id est 28 :\n\nCommande n° $v->id\nClient : $v->nom_client\nDe la Carte n° $v->carte_id\n";
}
