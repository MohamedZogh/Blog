<?php 
include_once('../controllers/connection.php');
include_once('../modele/article.php');

$database = connect();

if (!is_null($database)) {

    if (isset($_POST['title'])){

        $title = $_POST['title'];

        if (isset($_POST['content'])){

            $content = $_POST['content'];
        
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
    }

}
?>
