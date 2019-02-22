<?php 
include_once('connection.php');
include_once('like.php');
include_once('dislike.php');

function return_likes(){
    $database = connect();
if (!is_null($database)) {

    $locate = ("SELECT likes FROM compteur WHERE id=1");

    $prepared_request2 = $database -> prepare ($locate);
    
    // bindParam associe :nom dans la requete à $nom_emetteur
    //$prepared_request -> bindParam(':prenom' , $prenom, PDO::PARAM_STR, 12);

    $prepared_request2 -> execute();

    $quantiteLikes = $prepared_request2 -> fetch();

    $prepared_request2 -> closeCursor();
        $majLikes = $quantiteLikes['likes'];

    return $majLikes;
    
    }

}

function return_Dislikes(){
    $database = connect();
if (!is_null($database)) {

    $locate = ("SELECT dislikes FROM compteur WHERE id=1");

    $prepared_request2 = $database -> prepare ($locate);
    
    // bindParam associe :nom dans la requete à $nom_emetteur
    //$prepared_request -> bindParam(':prenom' , $prenom, PDO::PARAM_STR, 12);

    $prepared_request2 -> execute();

    $quantiteDislikes = $prepared_request2 -> fetch();

    $prepared_request2 -> closeCursor();
        $majDislikes = $quantiteDislikes['dislikes'];

    return $majDislikes;
    
    }

}

$majDislikes = return_Dislikes();

$majLikes = return_likes();

function allComments(){
        
    $database = connect();

        $locate = ("SELECT date_create,content FROM comments;");                       
        $prepared_request = $database -> prepare ($locate);

        // bindParam associe :nom dans la requete à $nom_emetteur
        //$prepared_request -> bindParam(':prenom' , $prenom, PDO::PARAM_STR, 12);

        $prepared_request -> execute();
        // On recupere sous forme de tablaue avec fetch.
        $Comments = $prepared_request -> fetchAll();
        // On recupere les donnes du case..
        $prepared_request -> closeCursor();

        return $Comments;
}

$Comments = allComments();



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    
</head>
<body>
    <div id="page">
        <section id="article">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione saepe corporis culpa libero temporibus, maiores hic eius voluptatibus doloribus possimus, fugit natus qui nostrum molestiae aperiam soluta consectetur ducimus quae!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione saepe corporis culpa libero temporibus, maiores hic eius voluptatibus doloribus possimus, fugit natus qui nostrum molestiae aperiam soluta consectetur ducimus quae!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione saepe corporis culpa libero temporibus, maiores hic eius voluptatibus doloribus possimus, fugit natus qui nostrum molestiae aperiam soluta consectetur ducimus quae!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione saepe corporis culpa libero temporibus, maiores hic eius voluptatibus doloribus possimus, fugit natus qui nostrum molestiae aperiam soluta consectetur ducimus quae!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione saepe corporis culpa libero temporibus, maiores hic eius voluptatibus doloribus possimus, fugit natus qui nostrum molestiae aperiam soluta consectetur ducimus quae!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione saepe corporis culpa libero temporibus, maiores hic eius voluptatibus doloribus possimus, fugit natus qui nostrum molestiae aperiam soluta consectetur ducimus quae!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione saepe corporis culpa libero temporibus, maiores hic eius voluptatibus doloribus possimus, fugit natus qui nostrum molestiae aperiam soluta consectetur ducimus quae!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione saepe corporis culpa libero temporibus, maiores hic eius voluptatibus doloribus possimus, fugit natus qui nostrum molestiae aperiam soluta consectetur ducimus quae!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione saepe corporis culpa libero temporibus, maiores hic eius voluptatibus doloribus possimus, fugit natus qui nostrum molestiae aperiam soluta consectetur ducimus quae!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione saepe corporis culpa libero temporibus, maiores hic eius voluptatibus doloribus possimus, fugit natus qui nostrum molestiae aperiam soluta consectetur ducimus quae!
            </p>
        </section>
        
        <aside>
            <p id="compteur">   <button id="lever" type="button" onclick="like()"> <i id="bien" class="far fa-thumbs-up"></i></button> <span name="like" id="like"> <?php echo $majLikes ?> </span> 
                                <button id="baisser" type="button" onclick="dislike()"><i id="nul" class="far fa-thumbs-down"></i> </button> <span name="dislike" id="dislike"><?php echo $majDislikes ?></span>
            </p>
        </aside>
        
        <textarea id="comment" name="comment" cols="200" rows="10" placeholder="Donner votre avis :)"></textarea>
        <input id="envoie" type="submit" value="Envoyer" onclick="getComments()">
        

        <section id="liste">
          <?php 
          foreach($Comments as $key => $comment) {
            ?>
            <p class="commentaire">  <?php echo $comment['date_create']."<br>".$comment['content']; ?> </p> <?php
          } ?>
        </section>
    </div>
    <script type="text/javascript" src="main.js"></script>
</body>
</html>
