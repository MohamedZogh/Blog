function add() 
{   

    var    xhr    =    new    XMLHttpRequest();    
 
    xhr.onreadystatechange    =    function() {    
             if    (xhr.readyState    ==    4    &&    xhr.status    ==    200)    {    
                
                var id = JSON.parse(xhr.response).id;
                var title1 = JSON.parse(xhr.response).title;
                var content1 = JSON.parse(xhr.response).content;

                var enfant = document.createElement("p");
                var parent = document.getElementById("partie2");                    
                parent.appendChild(enfant);

                var contenu = id + " " + title1 + " " + content1 ;
                document.getElementById("partie2").lastChild.innerHTML += contenu;
                 }    
            }    


    xhr.open('POST','controllers2/add_comment.php');
 
    var	data	=	new	FormData();	
    data.append('title', document.getElementById('title').value);
    data.append('content', document.getElementById('content').value);

    xhr.send(data);

    }

function Modifier(id){
    var id = id;

    var    xhr    =    new    XMLHttpRequest();    
 
    xhr.onreadystatechange    =    function() {    
             if    (xhr.readyState    ==    4    &&    xhr.status    ==    200)    {    
                
                var identifiant = JSON.parse(xhr.response).id;
                var title1 = JSON.parse(xhr.response).title;
                var content1 = JSON.parse(xhr.response).content;

                document.getElementById("title").value = title1;
                document.getElementById("content").innerHTML = content1;
                document.getElementById("identifiant").innerHTML = identifiant;

                
                 }    
            }    


    xhr.open('POST','controllers2/select_Id.php');
 
    var	data	=	new	FormData();	
    data.append('id', id);

    xhr.send(data);

} 
    
function update() 
{   

    var    xhr    =    new    XMLHttpRequest();    
    
    xhr.onreadystatechange    =    function() {    
                if    (xhr.readyState    ==    4    &&    xhr.status    ==    200)    {    

                var identifiant = JSON.parse(xhr.response).id;
                var title1 = JSON.parse(xhr.response).title;
                var content1 = JSON.parse(xhr.response).content;

                document.getElementById("title").value = title1;
                document.getElementById("content").innerHTML = content1;
                document.getElementById("identifiant").value = identifiant;
                
                    }    
            }    


    xhr.open('POST','controllers2/update_comment.php');
    
    var	data	=	new	FormData();	
    data.append('title', document.getElementById('title').value);
    data.append('content', document.getElementById('content').value);
    data.append('identifiant', document.getElementById('identifiant').value);

    xhr.send(data);

}

function add_user() 
{ 

    var    xhr    =    new    XMLHttpRequest();    
 
    xhr.onreadystatechange    =    function() {    
             if    (xhr.readyState    ==    4    &&    xhr.status    ==    200)    {  
                  
                
                // var id = JSON.parse(xhr.response).id;
                var nom = JSON.parse(xhr.response).nom;
                var prenom = JSON.parse(xhr.response).prenom;
                var email = JSON.parse(xhr.response).email;

                var enfant = document.createElement("p");
                var parent = document.getElementById("liste_user");                    
                parent.appendChild(enfant);

                var contenu = nom + " " + prenom + " " + email ;
                document.getElementById("liste_user").lastChild.innerHTML += contenu;
                 }    
            }    


    xhr.open('POST','controllers2/add_user.php');
 
    var	data	=	new	FormData();	
    data.append('nom', document.getElementById('nom').value);
    data.append('prenom', document.getElementById('prenom').value);
    data.append('email', document.getElementById('email').value);

    xhr.send(data);

    }

function update_user() 
{   

    var    xhr    =    new    XMLHttpRequest();    
    
    xhr.onreadystatechange    =    function() {    
                if    (xhr.readyState    ==    4    &&    xhr.status    ==    200)    {    

                var identifiant_user = JSON.parse(xhr.response).id;
                var id= parseInt(identifiant_user);
                var nom = JSON.parse(xhr.response).nom;
                var prenom = JSON.parse(xhr.response).prenom;
                var email = JSON.parse(xhr.response).email;
                var contenu = nom + " " + prenom + " " +email ;

                document.getElementById(id).innerHTML = contenu ;
                
                    }    
            }    


    xhr.open('POST','controllers2/update_user.php');
    
    var	data	=	new	FormData();	
    data.append('nom', document.getElementById('nom').value);
    data.append('prenom', document.getElementById('prenom').value);
    data.append('email', document.getElementById('email').value);
    data.append('identifiant', document.getElementById('identifiant_user').value);

    xhr.send(data);

}   

function Modifier_user(id){
    var id = id;

    var    xhr    =    new    XMLHttpRequest();    
 
    xhr.onreadystatechange    =    function() {    
             if    (xhr.readyState    ==    4    &&    xhr.status    ==    200)    {    

                var identifiant = JSON.parse(xhr.response).id;
                var nom = JSON.parse(xhr.response).nom;
                var prenom = JSON.parse(xhr.response).prenom;
                var email = JSON.parse(xhr.response).email;
                
                document.getElementById("identifiant_user").value = identifiant;
                document.getElementById("nom").value = nom;
                document.getElementById("prenom").value = prenom;
                document.getElementById("email").value = email;
                
                 }    
            }    


    xhr.open('POST','controllers2/select_Id_User.php');
 
    var	data	=	new	FormData();	
    data.append('id', id);

    xhr.send(data);

}

function Supprimer_user(id) 
{   
    var id = id;
    var    xhr    =    new    XMLHttpRequest();    
    
    xhr.onreadystatechange    =    function() {    
                if    (xhr.readyState    ==    4    &&    xhr.status    ==    200)    { 

                var element = document.getElementById(id);
                element.parentNode.removeChild(element);
                
                    }    
            }    


    xhr.open('POST','controllers2/delete_user.php');
    
    var	data	=	new	FormData();	
    data.append('id', id);

    xhr.send(data);

}   