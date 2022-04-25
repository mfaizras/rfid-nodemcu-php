
    <script>
        function showloading()
        {
            $("#loading").fadeIn("slow"); 
        }
        function hideloading()
        {
            $("#loading").fadeOut("slow"); 
        }
        function buka(link)
        {
        	$.ajax({
        	type: "GET",
        	url: link+".php",
	        beforeSend: showloading(),
        	success: function(msg){
	        $("#indexhome").hide();
        	$("#indexhome").html(msg).show("slow");
	        hideloading();
        	},
        	error: function(msg){
        	$("#indexhome").html("<font color='#ff0000'>Ajax loading error, please try again.</font>").show("slow");
        	hideloading();
        	}
        	//, complete: hideloading()
        	});
        }

		function post()
        {
            $("#saldotransaksi").hide();
            $("#loading").fadeIn("slow"); 
            $("input").attr("disabled", "disabled");
            $("select").attr("disabled", "disabled");
            $("button").attr("disabled", "disabled");
            $("textarea").attr("disabled", "disabled");
        }
        function result()
        {
            $("#loading").fadeOut("slow"); 
            $("input").removeAttr("disabled");
            $("select").removeAttr("disabled");
            $("button").removeAttr("disabled");
            $("textarea").removeAttr("disabled");
        }

        </script>