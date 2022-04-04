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


$cartes = Carte::whereHas('commandes', function ($q) {
  $q->where('montant', '>', 30.0);
})->get();
foreach ($cartes as $v) {
	echo "\nLes cartes contenant des commandes dont le montant est supérieur à 30.0 :\n\nCarte n° $v->id\nProprietaire : $v->nom_proprietaire\nMail : $v->mail_proprietaire\nCumul : $v->cumul\n";
}
