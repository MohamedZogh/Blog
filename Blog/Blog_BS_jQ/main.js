$("#card_0").hide();

$("#button").click(function(){

    var val = parseInt($("#offset").val()) + 3;
    $("#offset").val(val);

                $.ajax({
                    url: "/Blog/controllers_BlogjQ/blogjQBS.php",
                    type: "POST",
                    
                    data: {      
                        offset : $("#offset").val(),
                    },
                    
                    success: function( article ) {
                        
                        for(var i =0; i <= 3 ; i++){

                              var last_card =  $('#card_0').clone();
                            
                            $(last_card).find("h5").html(article[i].title);
                            $(last_card).find("p").html(article[i].content);
                            last_card.show();
                            last_card.appendTo("#row");

                        }

                    },
                    dataType: "json"  
                })
    }
)

$('#load_spinner').hide().ajaxStart(function() {
        $(this).show();
    })
    .ajaxStop(function() {
        $(this).hide();
    })
;

