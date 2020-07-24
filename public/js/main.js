$(document).ready(function(){

    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
	});
	
	$('#empTable').DataTable({
		"bLengthChange": true,
		"bInfo": true,
		"bPaginate": true,
		"bFilter": true,
		"bSort": true,
		"pageLength": 10,
		"order": [1, "asc"]
	});


	$('#deptTable').DataTable({
		"bLengthChange": true,
		"bInfo": true,
		"bPaginate": true,
		"bFilter": true,
		"bSort": true,
		"pageLength": 3,
		"order": [1, "asc"]
	});

	
	





	
});


