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

$creerCarte = new Carte();
$creerCarte->password = 'motdepasseSecret...';
$creerCarte->nom_proprietaire = 'Antonin Winterstein';
$creerCarte->mail_proprietaire = 'antonin.winterstein@gmail.com';
$creerCarte->cumul = 1310.52;
$creerCarte->save();

echo "\nUne carte a été créée !\n";