<?php 
include_once('../controllers/connection.php');
include_once('../modeles/article.php');

$database = connect();

if (!is_null($database)) {

    if (isset($_POST['id'])){

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

}
?>