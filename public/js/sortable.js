
	var obj = {};


    $( function() {

    $( "#sortable" ).sortable();

    $( "#sortable" ).disableSelection();

    $(".thechoosen").click(function(event) {
    	/* Act on the event */
    	$(this).closest("div").parent().next().find("p").find("span").text($(this).text());
    	obj[$(this).attr('data-index')] = $(this).attr('data-id');
			$(".menus0").hide();
			$(".menus1").hide();
			$(".menus2").hide();
			$(".menus3").hide();
			$(".menus4").hide();
			$(".menus5").hide();
			$(".menus6").hide();
			return false;
    });

		$(".drop0").click(function(){
			$(".menus0").show();
		});

		$(".drop1").click(function(){
			$(".menus1").show();
		});

		$(".drop2").click(function(){
			$(".menus2").show();
		});

		$(".drop3").click(function(){
			$(".menus3").show();
		});

		$(".drop4").click(function(){
			$(".menus4").show();
		});

		$(".drop5").click(function(){
			$(".menus5").show();
		});

		$(".drop6").click(function(){
			$(".menus6").show();
		});



    $(".save").click(function(){
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
    	obj['title'] 				= $("#form3").val();
    	obj['description']  = $("#form1").val();
			obj['image'] 				= $('input[type=file]').val().replace(/C:\\fakepath\\/i, '');

    	$.ajax({
    		type    : "POST",
    		url     : $("base").attr('href') + "index.php/createissue/insert",
    		data    : obj,
    		success : function(data){
    				eraser();
            alert('Data Saved');
						$('#myModals').modal('toggle');
    		},
    		error   : function(){
    				console.log("error");
						alert('Data Saved Error');
    		}
    	});
        return false;
    });

		$(".save").click(function(){
			var file_data = $('#file').prop('files')[0];
      var form_data = new FormData();
      form_data.append('file', file_data);
      $.ajax({
          url: $("base").attr('href') + "index.php/createissue/do_upload",
          dataType: 'text',
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          type: 'post',
          success: function (response) {
              $('#msg').html(response); // display success response from the server
          },
          error: function (response) {
              $('#msg').html(response); // display error response from the server
          }
      });
		});

    $(".cancel").click(function(){
    	eraser();
    	return false;
    });

		$(".close").click(function(){
			eraser();
		});

		$(".addModuleGitRepo").click(function(){
			obj['module'] 	= $("#addModule").val();
    	obj['gitRepo']  = $("#addGitRepo").val();

    	$.ajax({
    		type    : "POST",
    		url     : $("base").attr('href') + "index.php/home/insertModuleRepo",
    		data    : obj,
    		success : function(data){
    				eraser();
            alert('Data Saved');
						$('#myModalx').modal('toggle');
    		},
    		error   : function(){
    				console.log("error");
						alert('Data Saved Error');
    		}
    	});
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
		$("#image").val("");

    }
