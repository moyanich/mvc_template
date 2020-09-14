function validateRetirement() {
	$(document).ready(function() {
		var male_retirement = $('#male_retirement').val();
		console.log(male_retirement);

		$.ajax({
			type: "POST",
			url: "validateRetirement",
			data: {
				male_retirement: male_retirement
			},
        	success: function(response) {
				$('.invalid-feedback').html(response);
				if($.trim(response)) {
					$('#male_retirement').addClass('is-invalid');
				}
				else if (!$.trim(response)) {
					$('#male_retirement').removeClass('is-invalid');
				}
			},
			error:function() {}
		});
	});
}

function validatecompName() {
	$(document).ready(function() {
		var compName = $('#compName').val();
				
		$.ajax({
			type: 'POST',
			data: {
				compName: compName
			},
			url: 'validatecompName',
			success: function(response) {
				$('.invalid-feedback').html(response);
				if($.trim(response)) {
					$('#compName').addClass('is-invalid');
				}
				else if (!$.trim(response)) {
					$('#compName').removeClass('is-invalid');
				}
			},
			error:function() {}
		});
	}); 
}

function validateTRN() {
	$(document).ready(function() {
		var compTRN = $('#compTRN').val();
		$.ajax({
			type: 'POST',
			data: {
				compTRN: compTRN
			},
			url: 'validateTRN',
			success: function(response) {
				$('.invalid-feedback').html(response);
				if($.trim(response)) {
					$('#compTRN').addClass('is-invalid');
				}
				else if (!$.trim(response)) {
					$('#compTRN').removeClass('is-invalid');
				}
			},
			error:function() {}
		}); 
	}); 
}

function validateNIS() {
	$(document).ready(function() {
		var compNIS = $('#compNIS').val();
						
		$.ajax({
			type: 'POST',
			data: {
				compNIS: compNIS
			},
			url: 'validateNIS',
			success: function(response) {
				$('.invalid-feedback').html(response);
				if($.trim(response)) {
					$('#compNIS').addClass('is-invalid');
				}
				else if (!$.trim(response)) {
					$('#compNIS').removeClass('is-invalid');
				}
			},
			error:function() {}
		}); 
	}); 
}