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


$carte = Carte::find(10);

$commande1 = new Commande();
$commande1->id = '00001';
$commande1->montant = 15.70;
$commande1->etat = 1;
$commande1->remise = null;
$commande1->ref_paiement = null;
$commande1->nom_client = 'Antonin';
$commande1->date_livraison = '2020-12-02 10:07:10';

$carte->commandes()->save($commande1);


$commande2 = new Commande();
$commande2->id = '00002';
$commande2->montant = 21.50;
$commande2->etat = 2;
$commande2->remise = null;
$commande2->ref_paiement = null;
$commande2->nom_client = 'Yassine';
$commande2->date_livraison = '2020-12-02 10:07:10';


$carte->commandes()->save($commande2);


$commande3 = new Commande();
$commande3->id = '00003';
$commande3->montant = 5.00;
$commande3->etat = 3;
$commande3->remise = null;
$commande3->ref_paiement = null;
$commande3->nom_client = 'Jean';
$commande3->date_livraison = '2020-12-02 10:07:10';


$carte->commandes()->save($commande3);

echo "\nLes commandes ont été ajoutées !\n";