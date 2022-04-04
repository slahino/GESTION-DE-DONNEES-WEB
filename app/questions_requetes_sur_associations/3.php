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

$items = Item::where('tarif', '<', '5.0')->whereHas('commandes', function($q) {
  $q->where('id', '=', '9f1c3241-958a-4d35-a8c9-19eef6a4fab3');
})->get();
foreach ($items as $v) {
	echo "\nLes items de la commande 9f1c3241-958a-4d35-a8c9-19eef6a4fab3 dont le tarif est inférieur à 5.0 :\n\nItems n° $v->id\nLibellé : $v->libelle\nTarif : $v->tarif\n";
}
