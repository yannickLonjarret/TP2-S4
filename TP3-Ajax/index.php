<?php
require 'vendor/autoload.php';

Flight::route("GET /",function(){
    Flight::json(["message"=>"vide"]);
});


/**
 * Exo 1
 * retourne vrai/faux si un utilisateur existe déjà dans la base
 */
Flight::route("GET /username/existe/@name",function($name){

    $pdo = new PDO("sqlite:data.db");
    $resultat=NULL;

    $recherche = $pdo->prepare("SELECT COUNT(*) FROM User WHERE nomUser = ?");
    $recherche->execute(array($name));
    $nombre = $recherche->fetchColumn(0);

    if($nombre != 0) {
        $resultat = ["Existe"=>"Vrai"];
    } else {
        $resultat = ["Existe"=>"Faux"];
    }
    
    Flight::json($resultat);
  
  });

/**
 * Exo2
 * retourne la liste des styles contenant (ou commençant par) le paramètre passé par jQuery autocomplete
 */
Flight::route("GET /styles",function(){

    $pdo = new PDO("sqlite:data.db");
    $resultat=NULL;
    $recherche = Flight::request()->query->$term;
    $resultat->execute(array("%$recherche%"));

    /**
     * TODO : à compléter
     */

        

        Flight::json($resultat);
    }
  );



/**
 * Exo3 
 * Retourne une liste de communes selon leur code postal
 */
Flight::route("GET /commune/@code",function($code){

    $pdo = new PDO("sqlite:data.db");
    $resultat=NULL;

    $recherche = $pdo->prepare("SELECT CodeCommune FROM Commune WHERE CodePostal = ?");
    $recherche->execute(array($code));
    $resultat = $recherche->fetchAll(PDO::FETCH_ASSOC);

    /**
     * TODO : à compléter
     */


    Flight::json($resultat);
  
  });



Flight::start();

?>