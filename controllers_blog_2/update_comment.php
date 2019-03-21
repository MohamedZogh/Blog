<?php 
include_once('../controllers/connection.php');
include_once('../modeles/Article.php');

$database = connect();

if (!is_null($database)) {

    if (isset($_POST['title'])){

        $title = $_POST['title'];

        if (isset($_POST['content'])){

            $content = $_POST['content'];

            if (isset($_POST['identifiant'])){

                $id = $_POST['identifiant'];
        
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
                    

        }
    }

}
    
    // while ($donnees = $prepared_request->fetch(PDO::FETCH_ASSOC)) {

    // $perso = new Personnage($donnees);
            
    // echo $perso->nom(), ' a ', $perso->forcePerso(), ' de force, ', $perso->degats(), ' de dégâts, ', $perso->experience(), ' d\'expérience et est au niveau ', $perso->niveau();
    // }

    // }
?>