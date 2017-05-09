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
					firstname : $("#firstname").val(),
				    lastname  : $("#lastname").val(),
				    username  : $("#uname").val(),
				    access_type: $("#atype").val(),
				    password  : $("#pword").val(),
				    password2 : $("#pword2").val(),
				  };
				console.log(obj);

		$.ajax({
				type : "POST",
				 url : $("base").attr('href') + "index.php/main/register",
				data : obj,
			 success : function(data){

			 	console.log(data);


			 },
			 error : function(){
			 	console.log('error');
			 }
			

		});
	});

});
