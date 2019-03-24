<?php 
include_once('../controllers/connection.php');
include_once('../modeles/User.php');
include_once('../modeles/Response.php');
include_once('../modeles/SuccessResponse.php');
include_once('../modeles/FalseResponse.php');

$database = connect();

if (!is_null($database)) {

    if (isset($_POST['id'])){

        $id = $_POST['id'];
        
                    $locate = ("SELECT * FROM user WHERE id =$id");
                    $prepared_request = $database -> prepare ($locate); 
                    $prepared_request->setFetchMode(PDO::FETCH_CLASS,'User'); 

                    $prepared_request -> execute();
                    $Cible = $prepared_request -> fetch();
                    $prepared_request -> closeCursor();

                    echo (json_encode($Cible));

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