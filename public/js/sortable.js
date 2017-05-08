    
	var obj = {};


    $( function() {

    $( "#sortable" ).sortable();

    $( "#sortable" ).disableSelection();

    $(".thechoosen").click(function(event) {
    	/* Act on the event */
    	$(this).closest("div").parent().next().find("p").find("span").text($(this).text());
    	obj[$(this).attr('data-index')] = $(this).attr('data-id');
    	return false;
    });


    $(".btnsave").click(function(){
        if(jQuery.isEmptyObject(obj))
        {
            var arr = ['assign', 'modules_tbl_id', 'qa_type_id', 'git_repo_id', 'platform_type_id', 'priority_level', 'issue_type_id'];
            for(var i = 0; i < arr.length; i++)
            {
                obj[i] = $("#" + arr[i]).val();
            }
            obj['issue_id'] = $("#track_id").val();
            obj['approved'] = $("#approved").val();
        }
    	obj['title'] = $("#form3").val();
    	obj['description'] = $("#form1").val();
        
           
        



    	$.ajax({
    		type    : "POST",
    		url     : $("base").attr('href') + "index.php/createissue/insert",
    		data    : obj,
    		success : function(data){
    				eraser();
                    console.log(data);
    		},
    		error   : function(){
    			console.log("error");
    		}
    	});
        return false;
    });



    $(".btncancel").click(function(){
    	eraser();
    	return false;
    });

  });

    function eraser()
    {
    	var span = [
    				'.divassigned',
					'.divmodule',
					'.divqa',
					'.divgit',
					'.divplat',
					'.divpriority',
					'.divissuetype'
					]

		 for(var i = 0; i < span.length; i++)
		 {
		 	$(span[i]).find("span").text(" ");
		 }
		 
	

		$("#form1").val(" ");
		$("#form3").val(" ");
        $("#approved").val(" ");
        $("#track_id").val(" ");

    }







   