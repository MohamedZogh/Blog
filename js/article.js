function add_article() 
{   

    var    xhr    =    new    XMLHttpRequest();    
 
    xhr.onreadystatechange    =    function() {    
             if    (xhr.readyState    ==    4    &&    xhr.status    ==    200)    {    
                
                var id = JSON.parse(xhr.response).id;
                var title_article = JSON.parse(xhr.response).title;
                var content_article = JSON.parse(xhr.response).content;

                // var enfant = document.createElement("p");
                // var parent = document.getElementById("partie2");                    
                // parent.appendChild(enfant);

                // var contenu = id + " " + title1 + " " + content1 ;
                // document.getElementById("partie2").lastChild.innerHTML += contenu;

                var new_article = document.createElement("p");
                new_article.setAttribute("id", "article_"+id);
                var liste = document.getElementById("liste_articles");                 
                liste.appendChild(new_article);

                var contenu = title_article + " " + content_article + '<button type="button" onclick="modifier_article('+id+')">M</button>' +
                '<button type="button" onclick="Supprimer_article('+id+')">S</button>';
    
                document.getElementById("liste_articles").lastChild.innerHTML = contenu;
                 }    
            }    


    xhr.open('POST','controllers_blog_2/add_comment.php');
 
    var	data	=	new	FormData();	
    data.append('title', document.getElementById('title').value);
    data.append('content', document.getElementById('content').value);

    xhr.send(data);

    }

function modifier_article(id){
    var id = id;

    var    xhr    =    new    XMLHttpRequest();    
 
    xhr.onreadystatechange    =    function() {    
             if    (xhr.readyState    ==    4    &&    xhr.status    ==    200)    {    
                
                var identifiant = JSON.parse(xhr.response).id;
                var title1 = JSON.parse(xhr.response).title;
                var content1 = JSON.parse(xhr.response).content;

                document.getElementById("title").value = title1;
                document.getElementById("content").value = content1;
                document.getElementById("identifiant").value = identifiant;

                
                 }    
            }    


    xhr.open('POST','controllers_blog_2/select_Id.php');
 
    var	data	=	new	FormData();	
    data.append('id', id);

    xhr.send(data);

}

function supprimer_article(id) 
{   
    var id = id;
    var    xhr    =    new    XMLHttpRequest();    
    
    xhr.onreadystatechange    =    function() {    
                if    (xhr.readyState    ==    4    &&    xhr.status    ==    200)    { 

                var element = document.getElementById("article_"+id);
                element.parentNode.removeChild(element);
                
                    }    
            }    


    xhr.open('POST','controllers_blog_2/delete_article.php');
    
    var	data	=	new	FormData();	
    data.append('id', id);

    xhr.send(data);

}  
    
function update_article() 
{   

    var    xhr    =    new    XMLHttpRequest();    
    
    xhr.onreadystatechange    =    function() {    
                if    (xhr.readyState    ==    4    &&    xhr.status    ==    200)    {  

                var identifiant = JSON.parse(xhr.response).id;
                var title = JSON.parse(xhr.response).title;
                var content = JSON.parse(xhr.response).content;
                var article = title +" "+ content;
                
                document.getElementById('article_'+identifiant).innerHTML = article + " " +
                "<button type='button' onclick='modifier_article(" + identifiant +")'>M</button>" + " " +
                "<button type='button' onclick='supprimer_article(" + identifiant +")'>S</button>";
                
                    }    
            }    


    xhr.open('POST','controllers_blog_2/update_comment.php');
    
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
                  
                
                var id = JSON.parse(xhr.response).id;
                var nom = JSON.parse(xhr.response).nom;
                var prenom = JSON.parse(xhr.response).prenom;
                var email = JSON.parse(xhr.response).email;

                var new_user = document.createElement("p");
                new_user.setAttribute("id", "user_"+id);
                var liste = document.getElementById("liste_user");                 
                liste.appendChild(new_user);
                

                // var button = document.createElement("button");
                // button.setAttribute("type", "button");
                // button.innerHTML = "M";
                // button.addEventListener("click", "Modifier_user("+id+")");
                // new_p.appendChild(button);

                // var button2 = document.createElement("button");
                // button2.setAttribute("type", "button");
                // button2.innerHTML = "S";
                // button2.addEventListener("click", "Supprimer_user("+id+")");
                // new_p.appendChild(button2);
                
                var contenu = nom + " " + prenom + " " + email + '<button type="button" onclick="Modifier_user('+id+')">M</button>' +
                '<button type="button" onclick="Supprimer_user('+id+')">S</button>';
    
                document.getElementById("liste_user").lastChild.innerHTML = contenu;
                 }    
            }    


    xhr.open('POST','controllers_blog_2/add_user.php');
 
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
                var contenu = nom + " " + prenom + " " + email + '<button type="button" onclick="modifier_user('+id+')">M</button>' +
                '<button type="button" onclick="supprimer_user('+id+')">S</button>';

                document.getElementById(id).innerHTML = contenu ;
                
                    }    
            }    


    xhr.open('POST','controllers_blog_2/update_user.php');
    
    var	data	=	new	FormData();	
    data.append('nom', document.getElementById('nom').value);
    data.append('prenom', document.getElementById('prenom').value);
    data.append('email', document.getElementById('email').value);
    data.append('identifiant', document.getElementById('identifiant_user').value);

    xhr.send(data);

}   

function modifier_user(id){
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


    xhr.open('POST','controllers_blog_2/select_Id_User.php');
 
    var	data	=	new	FormData();	
    data.append('id', id);

    xhr.send(data);

}

function supprimer_user(id) 
{   
    var id = id;
    var    xhr    =    new    XMLHttpRequest();    
    
    xhr.onreadystatechange    =    function() {    
                if    (xhr.readyState    ==    4    &&    xhr.status    ==    200)    { 

                var element = document.getElementById(id);
                element.parentNode.removeChild(element);
                
                    }    
            }    


    xhr.open('POST','controllers_blog_2/delete_user.php');
    
    var	data	=	new	FormData();	
    data.append('id', id);

    xhr.send(data);

}   