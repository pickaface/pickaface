$(document).ready(function() {
	$("#chattext").keyup(function(e){
			if(e.keyCode == 13) {
				var chattext = $("#chattext").val();
				$.ajax({
					type:'POST',
					url:'InsertMessage.php',
					data:{chattext:chattext},
					success:function(){
						$("#chattext").val("");
					}
				})
			}
	})

	setInterval(function(){
			$("#ChatMessages").load("DisplayMessages.php");
	},1500)

	$("#ChatMessages").load("DisplayMessages.php");

});
