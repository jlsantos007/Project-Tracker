
	var obj = {};
	var input;
	var optionSelected;

    $( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
		$("#moduleRepo").hide();
		$("#labelModuleRepo").hide();

		$(document).click(function(){
			$(".menus0").hide();
			$(".menus1").hide();
			$(".menus2").hide();
			$(".menus3").hide();
			$(".menus4").hide();
			$(".menus5").hide();
			$(".menus6").hide();
		});

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
			// if ($.trim($('#form3').val()) == '') {
			// 	$('#myModals').modal('toggle');
			// 	swal({
			// 		title 						 : "Error!",
			// 		text  					   : "There is no issue title!",
			// 		type  						 : "error",
			// 		confirmButtonColor : "#DD6B55",
			// 		confirmButtonText  : "OK",
			// 		closeOnConfirm		 : true
			// 		},
			// 		function(){
			// 			$('#myModals').modal('show');
			// 	});
			// }
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
            swal("Issue Saved!", "Issue has been saved!", "success");
						$('#myModals').modal('toggle');
    		},
    		error   : function(){
    				console.log("error");
						$('#myModals').modal('toggle');
						swal({
							title 						 : "Saved Error!",
							text  					   : "Issue has not been saved!",
							type  						 : "error",
							confirmButtonColor : "#DD6B55",
							confirmButtonText  : "OK",
							closeOnConfirm		 : true
							},
							function(){
								$('#myModals').modal('show');
						});
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

		$(".savex").click(function(){
				if(jQuery.isEmptyObject(obj))
				{
						var arr = ['assign', 'modules_tbl_id', 'qa_type_id', 'git_repo_id', 'platform_type_id', 'priority_level', 'issue_type_id'];
						for(var i = 0; i < arr.length; i++)
						{
								obj[i] = $("#" + arr[i]).val();
						}
						obj['ids'] = $("#tracks").val();
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
						swal("Issue Saved!", "Issue has been saved!", "success");
						$('#myIssue').modal('toggle');
				},
				error   : function(){
						console.log("error");
						$('#myIssue').modal('toggle');
						swal({
							title 						 : "Saved Error!",
							text  					   : "Issue has not been saved!",
							type  						 : "error",
							confirmButtonColor : "#DD6B55",
							confirmButtonText  : "OK",
							closeOnConfirm		 : true
							},
							function(){
								$('#myIssue').modal('show');
						});
				}
			});
				return false;
		});

		$(".savex").click(function(){
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

		$('.moduleGit').change(function(){
			optionSelected = $(this).find("option:selected");
			if (optionSelected.val() == "modules") {
				jQuery("label[for='moduleRepo']").html("Module:");
				$("#moduleRepo").show();
				$("#labelModuleRepo").show();
				optionSelected = "modules_tbl";
			}
			else if (optionSelected.val() == "gitRepo") {
				jQuery("label[for='moduleRepo']").html("Git Repo:");
				$("#moduleRepo").show();
				$("#labelModuleRepo").show();
				optionSelected = "git_repo_tbl";
			}
		});

		$(".addModuleGitRepo").click(function(){
			input = $("#moduleRepo").val();

			$.ajax({
				type    : "POST",
				url     : $("base").attr('href') + "index.php/home/insertModuleRepo",
				data    : {option : optionSelected, input : input},
				success : function(data){
						eraser();
						swal("Module Saved!", "Module has been saved!", "success");
						$('#myModalx').modal('toggle');
						$("#moduleRepo").hide();
						$("#labelModuleRepo").hide();
				},
				error : function(){
						console.log("error");
						$('#myModalx').modal('toggle');
						swal({
							title 						 : "Saved Error!",
							text  					   : "Module has not been saved!",
							type  						 : "error",
							confirmButtonColor : "#DD6B55",
							confirmButtonText  : "OK",
							closeOnConfirm		 : true
							},
							function(){
								$('#myModalx').modal('show');
						});
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

					var arr = ['assign', 'modules_tbl_id', 'qa_type_id', 'git_repo_id', 'platform_type_id', 'priority_level', 'issue_type_id'];
					for(var i = 0; i < arr.length; i++)
					{
							obj[i] = $("#" + arr[i]).val(" ");
					}

		 for(var i = 0; i < span.length; i++)
		 {
		 	$(span[i]).find("span").text(" ");
		 }

		$("#form1").val(" ");
		$("#form3").val(" ");
    $("#approved").val(" ");
    $("#track_id").val(" ");
		$("#image").val("");
		$("#moduleGit").val("");
		$("#addModule").val(" ");
		$("#addGitRepo").val(" ");
    }
