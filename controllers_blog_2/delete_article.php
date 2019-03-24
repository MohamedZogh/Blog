<?php 
include_once('../controllers/connection.php');
include_once('../modeles/user.php');
include_once('../modeles/Response.php');
include_once('../modeles/SuccessResponse.php');
include_once('../modeles/FalseResponse.php');

$database = connect();

if (!is_null($database)) {

    if (($_POST['id'])!= null){

        $id = htmlspecialchars($_POST['id']);
        
                    $locate = ("DELETE FROM articles WHERE id =$id");
                    $prepared_request = $database -> prepare ($locate);

                    $prepared_request -> execute();
                    $prepared_request -> closeCursor();
    }
    else{
        $response = new FalseResponse(false, "L'id n'a pas ete transmis ");
        echo (json_encode($response));
    }

}
else{
    $response = new FalseResponse(false, "La connection a la base a echouee ");
    echo (json_encode($response));
}
?>