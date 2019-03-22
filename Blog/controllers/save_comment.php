<?php 
include_once('connection.php');

date_default_timezone_set('UTC');
$dates=date('Y-m-d');
$date = "$dates";

$database = connect();

if (!is_null($database)) {

    if (isset($_POST['comment'])){

        $comment = $_POST['comment'];
        
        $locate = ("INSERT INTO comments (date_create, content) 
        VALUES ('$date', '$comment');");

        $prepared_request = $database -> prepare ($locate);
        
        // bindParam associe :nom dans la requete à $nom_emetteur
        //$prepared_request -> bindParam(':prenom' , $prenom, PDO::PARAM_STR, 12);

        $prepared_request -> execute();
        $prepared_request -> closeCursor();

        echo 'True';
    }
    else {
        echo 'False';
    }
}

if (!is_null($database)) {

    $locate = ("UPDATE compteur SET dislikes = dislikes +1 WHERE id=1");

    $prepared_request = $database -> prepare ($locate);
    
    // bindParam associe :nom dans la requete à $nom_emetteur
    //$prepared_request -> bindParam(':prenom' , $prenom, PDO::PARAM_STR, 12);

    $prepared_request -> execute();
    $prepared_request -> closeCursor();

}
?>