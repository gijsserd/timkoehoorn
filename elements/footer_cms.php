<footer>
	<script>
	$host = '<?=$_SERVER["HTTP_HOST"]?>';

	$(document).ready(function()
	{
	  $("tr:odd").css({
		"background-color":"#e8e8e8",
		});
	});
	
	function ConfirmDel(titel, table, id){
		console.log("Delete function started");
		console.log($host);
		var host;
		if (host == 'localhost') {
			host = 'localhost/timkoehoorn';
		}
		var test = confirm('Weet je zeker dat je het volgende artikel wilt verwijderen?\n ' + titel);
		if (test == true) {
			var loc = "delete.php?table=" + table + "&id=" + id;
			console.log(loc);
			console.log(host);
			RedirectDel(loc);
		} else {
			console.log("Delete canceled");
		}
	}
	
	function RedirectDel(loc) {
		console.log(loc);
		window.location.href = loc;
		console.log("Delete succes");
	}
	
	function Error() {
			console.log("function 'Error' started");
			
			if(document.location.search === ""){
				document.getElementById("error").style.display = "none";
				console.log("returned true. no querystring given.");
			}else if(document.location.search.split('=')[0] === "?status" ){
				var error_message = document.location.search.split('=')[1];
				var message = error_message.split("_").join(" ");
				document.getElementById("error-msg").innerHTML = message;
				console.log("returned false. '?status' found.");
			}
		};
		
	function ErrorRemove() {
		document.getElementById("error").style.display = "none";
	}
	
	</script>
</footer>