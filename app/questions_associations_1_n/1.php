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


    

$carte = Carte::where('id', '=', 42)->first();
$liste_commandes = $carte->commandes()->get();
echo "\n		Afficher la carte n° 42 et ses commandes.
	  \nID de la carte : $carte->id \n\n";
foreach ($liste_commandes as $v) {
  echo "Commande n° $v->id\nClient : $v->nom_client\nDe la Carte n° $v->carte_id\n\n";
}