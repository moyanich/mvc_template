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


