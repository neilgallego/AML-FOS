window.onload = function() {
		$(".itmbtn").on( "click", function() {
		// .itm is a class selector. anything with this class will trigger this function
			var q="";
			 //q = window.prompt("What Quatity?");
			if(!q.trim()){
				q=1;
			}
			if(isNaN(q)){
				alert(q + " is not a number.");
			}else{
				console.log("its a number");
			$("#qty"+$(this).data("itemnumber")).val(q);
			$("#frm"+$(this).data("itemnumber")).submit();	
			}

			
		console.log("item clicked: " + $(this).data("itemnumber"));
		});
}

