<?php 
include_once('../controllers/connection.php');
include_once('../modele/user.php');

$database = connect();

if (!is_null($database)) {

    if (isset($_POST['id'])){

        $id = $_POST['id'];
        
                    $locate = ("DELETE FROM user WHERE id =$id");
                    $prepared_request = $database -> prepare ($locate);

                    $prepared_request -> execute();
                    $prepared_request -> closeCursor();
    }

}
?>