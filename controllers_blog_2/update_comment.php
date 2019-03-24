<?php 
include_once('../controllers/connection.php');
include_once('../modeles/Article.php');
include_once('../modeles/Response.php');
include_once('../modeles/SuccessResponse.php');
include_once('../modeles/FalseResponse.php');

$database = connect();

if (!is_null($database)) {

    if (($_POST['title'])!= null){

        $title = htmlspecialchars($_POST['title']);

        if (($_POST['content'])!= null){

            $content = htmlspecialchars($_POST['content']);

            if (($_POST['identifiant'])!= null){

                $id = htmlspecialchars($_POST['identifiant']);
        
                $locate = ("UPDATE articles SET title = '$title', content= '$content' WHERE id=$id;");

                $prepared_request = $database -> prepare ($locate);
                
                // bindParam associe :nom dans la requete à $nom_emetteur
                //$prepared_request -> bindParam(':prenom' , $prenom, PDO::PARAM_STR, 12);
                $prepared_request -> execute();
                $prepared_request -> closeCursor();

                    $locate = ("SELECT * FROM articles WHERE id =$id");
                    $prepared_request2 = $database -> prepare ($locate);
                    
                    $prepared_request2->setFetchMode(PDO::FETCH_CLASS,'Article');  
                    // bindParam associe :nom dans la requete à $nom_emetteur
                    //$prepared_request2 -> bindParam(':prenom' , $prenom, PDO::PARAM_STR, 12);
                    $prepared_request2 -> execute();
                    $getArticle = $prepared_request2 -> fetch();
                    $prepared_request2 -> closeCursor();

        
                    echo (json_encode($getArticle));
            }
            else{
                $response = new FalseResponse(false, "L'id n'a pas ete transmis ");
                echo (json_encode($response));
            }
                    

        }
        else{
            $response = new FalseResponse(false, "Le contenu ne peut-etre nul");
            echo (json_encode($response));
        }
    }
    else{
        $response = new FalseResponse(false, "Le titre ne peut-etre nul");
            echo (json_encode($response));
    }

}
else{
    $response = new FalseResponse(false, "La connexion a la b ase de donnees a echouee");
    echo (json_encode($response));
}
    
?>