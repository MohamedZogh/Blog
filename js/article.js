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
