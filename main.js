function getComments(){
  
     //var comment =  document.getElementById("comment").value;
  
     var    xhr    =    new    XMLHttpRequest();    
  
     xhr.onreadystatechange    =    function() {    
              if    (xhr.readyState    ==    4    &&    xhr.status    ==    200)    {    
  
                  var reponse = xhr.responseText;
                  if (reponse == 'True') {

                     var enfant = document.createElement("p");
                      var parent = document.getElementById("liste");
                      
                       parent.appendChild(enfant);

                     var contenu = document.getElementById("comment").value ;
                     
                     document.getElementById("liste").lastChild.setAttribute("class", "newcommentaire");
                     document.getElementById("liste").lastChild.innerHTML += contenu;
                     
                  }
                  else {
                     alert('ça marche pas');
                  }
                 
              }    
    }    
  
  
    xhr.open('POST','save_comment.php');
    
    var	data	=	new	FormData();	
    data.append('comment',	document.getElementById('comment').value);
    xhr.send(data);
  
}

function like(){

   var    xhr    =    new    XMLHttpRequest();    

   xhr.onreadystatechange    =    function() {    
            if    (xhr.readyState    ==    4    &&    xhr.status    ==    200)    {    

               var reponse = xhr.responseText;
               
               if (reponse !== null) {
                  document.getElementById("like").innerHTML = reponse;
                  document.getElementById("bien").className = "fas fa-thumbs-up";
               }  

               else {
                  alert('probleme fonction like');
               }
               
            }    
   }    


   xhr.open('POST','like.php');

   var	data	=	new	FormData();	
   data.append('like',	document.getElementById('like').value);
   xhr.send(data);

}


function dislike(){

   var    xhr    =    new    XMLHttpRequest();    

   xhr.onreadystatechange    =    function() {    
            if    (xhr.readyState    ==    4    &&    xhr.status    ==    200)    {    

               var reponse = xhr.responseText;
               
               if (reponse !== null) {
                  document.getElementById("dislike").innerHTML = reponse;
                  document.getElementById("nul").className = "fas fa-thumbs-down";
               }  

               else {
                  alert('probleme fonction dislike');
               }
               
            }    
   }    


   xhr.open('POST','dislike.php');

   var	data	=	new	FormData();	
   data.append('dislike',	document.getElementById('dislike').value);
   xhr.send(data);
   
}
