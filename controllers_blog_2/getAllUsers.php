<?php 
include_once('controllers/connection.php');
include_once('modeles/User.php');
include_once('../modeles/Response.php');
include_once('../modeles/SuccessResponse.php');
include_once('../modeles/FalseResponse.php');

function getAllUsers(){
        
        $database = connect();
    
            $locate = ("SELECT * FROM user;");                       
            $prepared_request = $database -> prepare ($locate);

            $prepared_request->setFetchMode(PDO::FETCH_CLASS,'User');  
            // bindParam associe :nom dans la requete à $nom_emetteur
            //$prepared_request -> bindParam(':prenom' , $prenom, PDO::PARAM_STR, 12);
    
            $prepared_request -> execute();
            // On recupere sous forme de tablaue avec fetch.
            $Users = $prepared_request -> fetchAll();
            // On recupere les donnes du case..
            $prepared_request -> closeCursor();
    
             foreach ($Users as $user){ ?>
                <p id="<?php echo $user->id ?>"> <?php echo $user->nom." ".$user->prenom." ".$user->email; ?> <button type="button" onclick="modifier_user(<?php echo $user->id ?>)">M</button><button type="button" onclick="supprimer_user(<?php echo $user->id ?>)">S</button></p>
            <?php } ;
                
}
else{
    $response = new FalseResponse(false, "La connexion a la base de donnees a echouee");
    echo (json_encode($response));
}
?>