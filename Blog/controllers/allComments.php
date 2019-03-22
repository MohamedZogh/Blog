<?php 
function allComments(){
        
        $database = connect();
    
            $locate = ("SELECT date_create,content FROM comments;");                       
            $prepared_request = $database -> prepare ($locate);
    
            // bindParam associe :nom dans la requete à $nom_emetteur
            //$prepared_request -> bindParam(':prenom' , $prenom, PDO::PARAM_STR, 12);
    
            $prepared_request -> execute();
            // On recupere sous forme de tablaue avec fetch.
            $Comments = $prepared_request -> fetchAll();
            // On recupere les donnes du case..
            $prepared_request -> closeCursor();
    
            return $Comments;
    }
?>