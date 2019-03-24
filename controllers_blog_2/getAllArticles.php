<?php 
include_once('controllers/connection.php');
include_once('../modeles/Response.php');
include_once('../modeles/SuccessResponse.php');
include_once('../modeles/FalseResponse.php');

function getAllArticles(){
        
        $database = connect();
    
            $locate = ("SELECT * FROM articles;");                       
            $prepared_request = $database -> prepare ($locate);
    
            // bindParam associe :nom dans la requete à $nom_emetteur
            //$prepared_request -> bindParam(':prenom' , $prenom, PDO::PARAM_STR, 12);
    
            $prepared_request -> execute();
            // On recupere sous forme de tablaue avec fetch.
            $Articles = $prepared_request -> fetchAll();
            // On recupere les donnes du case..
            $prepared_request -> closeCursor();
    
            return $Articles;
    }
else{
    $response = new FalseResponse(false, "La connexion a la base de donnees a echouee");
    echo (json_encode($response));
}
?>