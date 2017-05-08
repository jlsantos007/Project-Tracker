$(function(){
	$(".history").click(function(){
		var id = $(this).attr('data-raw');
		var post = $(this).closest("div").prev().closest('div').parent().parent().parent();
		$.get($("base").attr('href') + "index.php/listofissue/history/" + id, function(data){
			post.prepend(data);
		});
		return false;
	});


	$(".hidePrepend").click(function(event) {
		/* Act on the event */
		var yes = $(this).closest('div').next().find('div');
		$(yes).find("div").not(":last-child").remove();
	});


	$(".cart").click(function(){
		var id = $(this).attr('data-raw');
		var self = $(this);
		 $.ajax({
		 	   type : "POST",
		 	   url  : $("base").attr('href') + "index.php/listofissue/addCoockiedata",
		 	   data : {cartid : id},
		 	success : function(data){
		 			$("#badge").text(data);
		 			self.closest('div').parent().parent().parent().parent().parent().parent().hide();
		 	},
		 	error : function(){

		 	}
		});
		return false;
	});


	  $(".make-issue").click(function(){
	  		var d = $(this).attr('data-raw');
	  		window.location = $("base").attr('href') + "index.php/createissue/createWithTrackId/" + d; 
	  		return false;
	  });
});