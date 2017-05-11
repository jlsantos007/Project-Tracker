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


	  $(".finish").click(function(){
			var id = $(this).attr('data-raw');
    	var self = $(this);
			$.ajax({
				type : "POST",
				url  : $("base").attr('href') + "index.php/common/done",
				data : { issueid : id },
				success : function(data)
					{
					if(data == "success")
					{
					self.closest('div').parent().parent().parent().parent().parent().parent().remove();
					}
				},
				error  : function(){

			}
			});
	  });

		$(".developer").click(function(){
			var id = $(this).attr('data-raw');
			var self = $(this);
      window.location = $("base").attr('href') + "index.php/createissue/createWithTrackId/" + id;
			self.closest('div').parent().parent().parent().parent().parent().parent().remove();
      return false;
		});

		$(".approved").click(function(){
			var id = $(this).attr('data-raw');
			var self = $(this);
			$.ajax({
				type : "POST",
				url  : $("base").attr('href') + "index.php/common/approved",
				data : { issueid : id },
				success : function(data){
					if(data == "success")
					{
					self.closest('div').parent().parent().parent().parent().parent().parent().remove();
					}
				},
				error  : function(){

			}
			});
		});

		$(".done").click(function(){
			var id = $(this).attr('data-raw');
			var self = $(this);
			$.ajax({
				type : "POST",
				url  : $("base").attr('href') + "index.php/common/finishQA",
				data : { issueid : id },
				success : function(data){
					if(data == "success")
					{
					self.closest('div').parent().parent().parent().parent().parent().parent().remove();
					}
				},
				error  : function(){

			}
			});
		});

});
