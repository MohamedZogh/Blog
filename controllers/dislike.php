<?php 
include_once('connection.php');

$database = connect();

if (!is_null($database)) {

    if (isset($_POST['dislike'])){

        $dislikes = $_POST['dislike'];

    $locate = ("UPDATE compteur SET dislikes = dislikes +1 WHERE id=1");

    $prepared_request = $database -> prepare ($locate);
    
    // bindParam associe :nom dans la requete à $nom_emetteur
    //$prepared_request -> bindParam(':prenom' , $prenom, PDO::PARAM_STR, 12);

    $prepared_request -> execute();
    $prepared_request -> closeCursor();

    $locate = ("SELECT dislikes FROM compteur WHERE id=1");

    $prepared_request2 = $database -> prepare ($locate);
    
    // bindParam associe :nom dans la requete à $nom_emetteur
    //$prepared_request2 -> bindParam(':prenom' , $prenom, PDO::PARAM_STR, 12);

    $prepared_request2 -> execute();

    $quantiteDislikes = $prepared_request2 -> fetch();

    $prepared_request2 -> closeCursor();

        $majDislikes = $quantiteDislikes['dislikes'];
    
        echo ($majDislikes);
        

    }

}