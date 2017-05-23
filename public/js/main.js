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
							alert("Wrong " + data[1])
						}

					},
				  error : function(){
				  			console.log('error');
				    }

			});
	});

	$("#register").click(function(){
		var obj = {
					  firstname     : $("#firstname").val(),
				    lastname      : $("#lastname").val(),
				    username      : $("#uname").val(),
				    git_repo_type : $("#gitrepo").val(),
				    access_type   : $("#atype").val(),
				    password      : $("#pass").val(),
				    password2     : $("#pass2").val()
				  };

		$.ajax({
				type : "POST",
				 url : $("base").attr('href') + "index.php/main/register",
				data : obj,
			 success : function(data){
			 console.log(data);
			 if($.trim($('#firstname').val()) == '' || $.trim($('#lastname').val()) == '' || $.trim($('#uname').val()) == '' || $.trim($('#gitrepo').val()) == ''){
				 console.log('Please fill out the empty fields');
			 }
			 else if ($.trim($('#atype').val()) == '' || $.trim($('#pass').val()) == '' || $.trim($('#pass2').val()) == '') {
				 console.log('Please fill out the empty fields');
			 }
			 else if (obj['password'] != obj['password2']) {
				 console.log("Password Not Match");
			 }
			 },
			 error : function(){
			 console.log('error');
			 }
		});
	});
});

function eraser()
{

$("#firstname").val("");
$("#lastname").val("");
$("#uname").val("");
$("#gitrepo").val("");
$("#atype").val("");
$("#pass").val("");
$("#pass2").val("");

}
