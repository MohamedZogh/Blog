<?php 
include_once('../controllers/connection.php');
include_once('../modeles/User.php');
include_once('../modeles/Response.php');
include_once('../modeles/SuccessResponse.php');
include_once('../modeles/FalseResponse.php');

$database = connect();

if (!is_null($database)) {

    if (($_POST['nom']!= null)){

        $nom = htmlspecialchars($_POST['nom']);

        if (($_POST['prenom']!= null)){

            $prenom = htmlspecialchars($_POST['prenom']);

            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

                $email = htmlspecialchars($_POST['email']);
        
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
            else{
                $response = new FalseResponse(false, "Le format de l'addresse email est mauvais");
                echo (json_encode($response));
            }    

        }
        else{
            $response = new FalseResponse(false, "Le prenom ne peut-etre nul");
            echo (json_encode($response));
        }
    }
    else{
        $response = new FalseResponse(false, "Le nom ne peut-etre nul");
        echo (json_encode($response));
    }

}
else{
    $response = new FalseResponse(false, "La connexion a la b ase de donnees a echouee");
    echo (json_encode($response));
}
?>