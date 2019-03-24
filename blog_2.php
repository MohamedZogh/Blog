<?php 
include_once('controllers/connection.php');
include_once('controllers_blog_2/getAllArticles.php');
include_once('controllers_blog_2/getAllUsers.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Users</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/articles.css">
    
</head>
<body>
    <div id="formulaire">

        <label for="title">Titre :</label>
        <input type="text" id="title" name="title" placeholder="Titre.."> <br>
        <label for="content">Content :</label> <br>
        <textarea name="content" id="content" cols="100" rows="15"></textarea>
        <input type="hidden" id="identifiant" name="identifiant">
        <div id="bouttons">
            <input id="ajouter" type="submit" value="Ajouter" onclick="add_article()">
            <input id="update" type="submit" value="Update" onclick="update_article()">
        </div>

    </div>
    

    <div id="liste_articles">

        <?php $Articles = getAllArticles();
            foreach($Articles as $key=> $article){ ?>
                <p id="article_<?php echo $article['id'];?>"> <?php echo $article['title']." ".$article['content']; ?> 
                    <button type="button" onclick="modifier_article(<?php echo $article['id'] ?>)">M</button>
                    <button type="button" onclick="supprimer_article(<?php echo $article['id'] ?>)">S</button></p>
                <?php } ?>
              
    </div>

    <div id="user">

        <div id="form_user">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" placeholder="Nom.."> <br>
            <label for="prenom">Prenom :</label>
            <input type="text" id="prenom" name="prenom" placeholder="Prenom.."> <br>
            <label for="email">Email :</label>
            <input type="text" id="email" name="email" placeholder="Email.."> <br>
            <input type="hidden" id="identifiant_user" name="identifiant_user">

            <div id="bouttons">
                <input id="ajouter_user" type="submit" value="Ajouter" onclick="add_user()">
                <input id="update_user" type="submit" value="Update" onclick="update_user()">
            </div>

        </div>
        <div id="border">
            <div id="liste_user">

            <?php $Users = getAllUsers();?>

            </div>
        </div>

    </div>

    <script src="js/article.js"></script>
</body>
</html>