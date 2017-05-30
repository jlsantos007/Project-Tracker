var obj = {};

$(function(){
	$("#login").click(function(){
			var obj = { username : $("#username").val(), password : $("#password").val()};
			console.log(obj);
			$.ajax({
				   type : "POST",
				    url : $("base").attr('href') + "index.php/main/check",
				   data : obj,
				success : function(data){
						// swal login success
						data = data.split("-");
						if(data[0] == 1)
						{
							window.location = data[1];
						}
						else
						{
							swal("Wrong " + data[1] + "!", data[1] + " does not exist!","warning");
							// alert("Wrong " + data[1])
						}

					},
				  error : function(){
				  			console.log('error');
				    }

			});
	});

	$("#register").click(function(){

		obj['firstname']     = $("#firstname").val();
		obj['lastname']      = $("#lastname").val();
		obj['username']      = $("#uname").val();
		obj['git_repo_type'] = $("#gitrepo").val();
		obj['access_type']   = $("#atype").val();
		obj['password']      = $("#pass").val();
		obj['password2']     = $("#pass2").val();

		$.ajax({
				type 		: "POST",
				url 		: $("base").attr('href') + "index.php/main/register",
				data	 	: obj,
			  success : function(data){
					if($.trim($('#firstname').val()) == '' || $.trim($('#lastname').val()) == '' || $.trim($('#uname').val()) == '' || $.trim($('#gitrepo').val()) == ''){
						$('#myModal').modal('toggle');
						swal({
							title 						  : "Error!",
							text  					    : "Don't leave empty fields!",
							type  						  : "error",
							confirmButtonColor : "#DD6B55",
							confirmButtonText  : "OK",
							closeOnConfirm		 	: true
							},
							function(){
								$('#myModal').modal('show');
						});
					 }
					 else if ($.trim($('#atype').val()) == '' || $.trim($('#pass').val()) == '' || $.trim($('#pass2').val()) == '') {
						 $('#myModal').modal('toggle');
						 swal({
							 title 						  : "Error!",
							 text  					    : "Don't leave empty fields!",
							 type  						  : "error",
							 confirmButtonColor : "#DD6B55",
							 confirmButtonText  : "OK",
							 closeOnConfirm		 	: true
							 },
							 function(){
								 $('#myModal').modal('show');
						 });
					 }
					 else if (obj['password'] != obj['password2']) {
						 $('#myModal').modal('toggle');
						 swal({
							 title 						  : "Error!",
							 text  					    : "Password does not match!",
							 type  						  : "error",
							 confirmButtonColor : "#DD6B55",
							 confirmButtonText  : "OK",
							 closeOnConfirm		 	: true
							 },
							 function(){
								 $('#myModal').modal('show');
						 });
					 }
					 else {
						eraser();
	 			 		swal("Account Saved", "You can now log in your account", "success");
	 					$('#myModal').modal('toggle');
					 }
			 },
			 error : function(){
			 console.log('error');
			}
		});
		return false;
	});

	$("#cancel").click(function(){
		$("#addAccount")[0].reset();
		return false;
	});

	$(".close").click(function(){
		eraser();
	})
});

function eraser()
{
$("#firstname").val(" ");
$("#lastname").val(" ");
$("#uname").val(" ");
$("#gitrepo").val("");
$("#atype").val("");
$("#pass").val("");
$("#pass2").val("");
}
