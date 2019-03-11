<?php 
include_once('../controllers/connection.php');
include_once('../modele/user.php');

$database = connect();

if (!is_null($database)) {

    if (isset($_POST['nom'])){

        $nom = $_POST['nom'];

        if (isset($_POST['prenom'])){

            $prenom = $_POST['prenom'];

            if (isset($_POST['email'])){

                $email = $_POST['email'];
        
                    $locate = ("INSERT INTO user (nom, prenom, email) 
                    VALUES ('$nom', '$prenom', '$email');");

                    $prepared_request = $database -> prepare ($locate);
                    
                    // bindParam associe :nom dans la requete à $nom_emetteur
                    //$prepared_request -> bindParam(':prenom' , $prenom, PDO::PARAM_STR, 12);
                    $prepared_request -> execute();
                    $prepared_request -> closeCursor();


                    $id =$database->lastInsertId();

                        $locate = ("SELECT * FROM user WHERE id =$id");
                        $prepared_request2 = $database -> prepare ($locate);
                        
                        $prepared_request2->setFetchMode(PDO::FETCH_CLASS,'User');  
                        // bindParam associe :nom dans la requete à $nom_emetteur
                        //$prepared_request2 -> bindParam(':prenom' , $prenom, PDO::PARAM_STR, 12);
                        $prepared_request2 -> execute();
                        $User = $prepared_request2 -> fetch();
                        $prepared_request2 -> closeCursor();

            
                        echo (json_encode($User));

            }        

        }
    }

}
?>