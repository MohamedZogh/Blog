<?php 
include_once('connection.php');

date_default_timezone_set('UTC');
$date=date('Y-m-d');

$database = connect();

if (!is_null($database)) {

    if (isset($_POST['like'])){

        $likes = $_POST['like'];

    $locate = ("UPDATE compteur SET likes = likes +1 WHERE id=1");

    $prepared_request = $database -> prepare ($locate);
    
    // bindParam associe :nom dans la requete à $nom_emetteur
    //$prepared_request -> bindParam(':prenom' , $prenom, PDO::PARAM_STR, 12);

    $prepared_request -> execute();
    $prepared_request -> closeCursor();

    $locate = ("SELECT likes FROM compteur WHERE id=1");

    $prepared_request2 = $database -> prepare ($locate);
    
    // bindParam associe :nom dans la requete à $nom_emetteur
    //$prepared_request -> bindParam(':prenom' , $prenom, PDO::PARAM_STR, 12);

    $prepared_request2 -> execute();

    $quantiteLikes = $prepared_request2 -> fetch();

    $prepared_request2 -> closeCursor();

            $majLikes = $quantiteLikes['likes'];
        
            echo ($majLikes);
            
        
    }

}