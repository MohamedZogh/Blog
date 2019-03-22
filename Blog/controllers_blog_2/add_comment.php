<?php 
include_once('../controllers/connection.php');
include_once('../modeles/article.php');
include_once('../modeles/Response.php');
include_once('../modeles/SuccessResponse.php');
include_once('../modeles/FalseResponse.php');

$database = connect();

if (!is_null($database)) {

    if ($_POST['title'] != null){

        $title = htmlspecialchars($_POST['title']);

        if ($_POST['content']!= null){

            $content = htmlspecialchars($_POST['content']);
        
                $locate = ("INSERT INTO articles (title, content) 
                VALUES ('$title', '$content');");

                $prepared_request = $database -> prepare ($locate);
                
                // bindParam associe :nom dans la requete à $nom_emetteur
                //$prepared_request -> bindParam(':prenom' , $prenom, PDO::PARAM_STR, 12);
                $prepared_request -> execute();
                $prepared_request -> closeCursor();


                $id =$database->lastInsertId();

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
            $response = new FalseResponse(false, "Content ne peut pas etre vide");
            echo (json_encode($response));
        }
    }
    else{
        $response = new FalseResponse(false, "Title ne peut pas etre vide");
        echo (json_encode($response));
    }
}
else{
    $response = new FalseResponse(false, "Connection a la base de donnees echoue");
    echo (json_encode($response));
}
?>
