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
    
    /**
     * TODO : à compléter
     */

    
    Flight::json($resultat);
  
  });

/**
 * Exo2
 * retourne la liste des styles contenant (ou commençant par) le paramètre passé par jQuery autocomplete
 */
Flight::route("GET /styles",function(){

    $recherche = Flight::request()->query->/*[A COMPLETER]*/PARAMETRE_DE_LA_REQUETE;
    $resultat=NULL;

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

    /**
     * TODO : à compléter
     */


    Flight::json($resultat);
  
  });



Flight::start();

?>