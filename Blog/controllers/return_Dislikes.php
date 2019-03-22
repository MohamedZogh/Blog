<?php

function return_Dislikes(){
    $database = connect();
if (!is_null($database)) {

    $locate = ("SELECT dislikes FROM compteur WHERE id=1");

    $prepared_request2 = $database -> prepare ($locate);
    
    // bindParam associe :nom dans la requete à $nom_emetteur
    //$prepared_request -> bindParam(':prenom' , $prenom, PDO::PARAM_STR, 12);

    $prepared_request2 -> execute();

    $quantiteDislikes = $prepared_request2 -> fetch();

    $prepared_request2 -> closeCursor();
        $majDislikes = $quantiteDislikes['dislikes'];

    return $majDislikes;
    
    }

}
?>