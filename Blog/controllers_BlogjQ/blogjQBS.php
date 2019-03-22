<?php 
include_once('connection.php');
include_once('../modeles/Article.php');
        
$valeur_offset = $_POST["offset"];
        $database = connect();
    
            $locate = ("SELECT * FROM articles ORDER BY id DESC LIMIT 3 OFFSET $valeur_offset;");                       
            $prepared_request = $database -> prepare ($locate);

            $prepared_request->setFetchMode(PDO::FETCH_CLASS,'Article');
    
            // bindParam associe :nom dans la requete à $nom_emetteur
            //$prepared_request -> bindParam(':prenom' , $prenom, PDO::PARAM_STR, 12);
    
            $prepared_request -> execute();
            // On recupere sous forme de tablaue avec fetch.
            $Articles = $prepared_request -> fetchAll();
            // On recupere les donnes du case..
            $prepared_request -> closeCursor();

            echo (json_encode($Articles));

?>