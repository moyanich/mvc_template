$(document).ready(function(){

    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
	});
	
	$('#empTable').DataTable({
		//"stateSave": true,
		"bLengthChange": true,
		"bInfo": true,
		"bPaginate": true,
		"bFilter": true,
		"bSort": true,
		"pageLength": 25,
		"order": [[ 0, "asc" ]]
	});
	

	$('#deptTable').DataTable({
		"bLengthChange": true,
		"bInfo": true,
		"bPaginate": true,
		"bFilter": true,
		"bSort": true,
		"pageLength": 15,
		"order": [[ 0, "asc" ]]
	});

	
	
  




	
});

/*
function showSuggestion(str){
	console.log(str);

	if(str.length == 0){
		document.getElementById('deptName-feedback').innerHTML = '';
	} else {
		// AJAX REQ
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				document.getElementById('deptName-feedback').innerHTML = this.responseText;
			}
		}
		xmlhttp.open("GET", ".../app/helpers/validation_helper.php?q="+str, true);
		xmlhttp.send();
	}
 }
 */