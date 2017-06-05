$(function(){
	$(".claim").click(function(){
		var id = $(this).closest('td').prev('').prev().prev().text();
		var self = $(this);
		  $.ajax({
		  	   type : "POST",
		  	   url  : $("base").attr('href') + "index.php/cart/claim",
		  	   data : { issue : id },
		  	success : function(data){
		 			self.parent().parent().hide();
		 			if(data == 0)
		 			{
		 				$("#badge").text("");
		 			}
		 			else
		 			{

		 				$("#badge").text(data);

		 			}

		  	 },
		  	  error : function(){
		  	  	console.log("error");
		  	}
		  });

	});

	$(".cancel").click(function(){
		var id = $(this).closest('td').prev('').prev().prev().text();
		var self = $(this);
		self.parent().parent().hide();
	});

});
