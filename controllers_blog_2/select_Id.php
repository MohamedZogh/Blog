<?php 
include_once('../controllers/connection.php');
include_once('../modeles/article.php');
include_once('../modeles/Response.php');
include_once('../modeles/SuccessResponse.php');
include_once('../modeles/FalseResponse.php');

$database = connect();

if (!is_null($database)) {

    if (($_POST['id']!= null))

        $id = $_POST['id'];
        
                    $locate = ("SELECT * FROM articles WHERE id =$id");
                    $prepared_request2 = $database -> prepare ($locate); 
                    $prepared_request2->setFetchMode(PDO::FETCH_CLASS,'Article'); 
                    // bindParam associe :nom dans la requete à $nom_emetteur
                    //$prepared_request2 -> bindParam(':prenom' , $prenom, PDO::PARAM_STR, 12);
                    $prepared_request2 -> execute();
                    $getCible = $prepared_request2 -> fetch();
                    $prepared_request2 -> closeCursor();

        
                    echo (json_encode($getCible));

    }
    else{
        $response = new FalseResponse(false, "L'id n'a pas ete transmis");
        echo (json_encode($response));
    }

}
else{
    $response = new FalseResponse(false, "La connexion a la base de donnees a echouee");
    echo (json_encode($response));
}
?>