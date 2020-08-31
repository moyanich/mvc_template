$(document).ready(function(){

    $("#menu-toggle").click(function(e) {
        e.preventDefault();
		$("#wrapper").toggleClass("toggled");
		$("body").toggleClass("expand-content");

		//n(window).width() < 1025 ? n("body").addClass("enlarge-menu") : n("body").removeClass("enlarge-menu")
	});

	$("body").removeClass("expand-content");
	
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

	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	})
	
  


	var ctx = document.getElementById('myChart').getContext('2d');
	var chart = new Chart(ctx, {
		// The type of chart we want to create
		type: 'line',
	
		// The data for our dataset
		data: {
			labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
			datasets: [{
				label: 'My First dataset',
				backgroundColor: 'rgb(255, 99, 132)',
				borderColor: 'rgb(255, 99, 132)',
				data: [0, 10, 5, 2, 20, 30, 45]
			}]
		},
	
		// Configuration options go here
		options: {}
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