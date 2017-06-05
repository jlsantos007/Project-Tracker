$(function(){
	$(".history").click(function(){
		var id = $(this).attr('data-raw');

		$.ajax({
			url 		: "modal.php",
			method	: "POST",
			data 		: {id : id},
			success	: function(data){
				$('#issue_detail').html(data);
				$('#myModalDetails').modal("show");
			}
		});
	});

	$(".nullHistory").click(function(){
		swal("No History Exist!", "There is no existing issue/s!", "warning");
	});

	$(".details").click(function(){
		var id = $(this).attr('data-raw');

		$.ajax({
			url 		: "modal.php",
			method	: "POST",
			data 		: {id : id},
			success	: function(data){
				$('#issue_detail').html(data);
				$('#myModalDetails').modal("show");
			}
		});
	});

	$(".hidePrepend").click(function(event) {
		/* Act on the event */
		var yes = $(this).closest('div').next().find('div');
		$(yes).find("div").not(":last-child").remove();
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

		$('.filter').change(function(){
			var optionSelected = $(this).find("option:selected");
			if (optionSelected.val() == "PENDING") {
				window.location = $("base").attr('href') + "index.php/common/pending";
			}
			else {
				window.location = $("base").attr('href') + "index.php/common/filterDone";
			}
			return false;
		});

		// $('select').change(function(){
		// 	var optionSelected = $(this).find("option:selected");
		// 	if (optionSelected.val() == "CURRENT") {
		// 		window.location = $("base").attr('href') + "index.php/common/filterCurrent";
		// 	}
		// 	else {
		// 		window.location = $("base").attr('href') + "index.php/common/filterBacklog";
		// 	}
		// 	return false;
		// });

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

		$(".claim").click(function(){
			var id = $(this).attr('data-raw');
			var self = $(this);
				$.ajax({
						 type : "POST",
						 url  : $("base").attr('href') + "index.php/listofissue/claim",
						 data : { issue : id },
					success : function(data){
						if(data == "success")
						{

						}
					},
					error  : function(){

				}
				});
		});

		$(".mywork").click(function(){
			var id = $(this).attr('data-raw');
			var self = $(this);
				$.ajax({
						 type : "POST",
						 url  : $("base").attr('href') + "/index.php/common/mywork",
						 data : { issue : id },
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

		// $(".current").click(function(){
		// 	var id = $(this).attr('data-raw');
		// 	var self = $(this);
		// 		$.ajax({
		// 				 type : "POST",
		// 				 url  : $("base").attr('href') + "index.php/listofissue/currents",
		// 				 data : { issue : id },
		// 			success : function(data){
		// 				if(data == "success")
		// 				{
		// 				self.closest('div').parent().parent().parent().parent().parent().parent().remove();
		// 				}
		// 			},
		// 			error  : function(){
		//
		// 		}
		// 		});
		// });
		//
		// $(".backlog").click(function(){
		// 	var id = $(this).attr('data-raw');
		// 	var self = $(this);
		// 		$.ajax({
		// 				 type : "POST",
		// 				 url  : $("base").attr('href') + "index.php/listofissue/backlogs",
		// 				 data : { issue : id },
		// 			success : function(data){
		// 				if(data == "success")
		// 				{
		// 				self.closest('div').parent().parent().parent().parent().parent().parent().remove();
		// 				}
		// 			},
		// 			error  : function(){
		//
		// 		}
		// 		});
		// });
});
