 $( function() {

    $( "#sortable" ).sortable();

    $( "#sortable" ).disableSelection();

    $(".btnfinish ").click(function(event) {
    	/* Act on the event */
    	var test = $(this).text();
    	var id = $(this).attr('data-raw');
    	var keme = $(this).parent().parent();

    	switch(test.trim())
    	{
    		case "Approved" :
    			$.ajax({
    				type : "POST",
    				url  : $("base").attr('href') + "index.php/common/approved",
    				data : { issueid : id },
    				success : function(data){
    					if(data == "success")
    					{
    					keme.hide();
    					}
    				},
    				error  : function(){

    			}
    	 		});
     		break;

     		case "Finish" :
     			$.ajax({
    				type : "POST",
    				url  : $("base").attr('href') + "index.php/common/done",
    				data : { issueid : id },
    				success : function(data)
    					{
    					if(data == "success")
    					{
    					keme.hide();
    					}
    				},
    				error  : function(){

    			}
    	 		});
     			break;

        case "Dev" :
        window.location = $("base").attr('href') + "index.php/createissue/createWithTrackId/" + id;
        keme.hide();
        return false;
      break;

      case "Details" :
      window.location = $("base").attr('href') + "index.php/listofcurrent";
      keme.hide();
      return false;
    break;

     }

    });
});
