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

function validateRetirementFemale() {
	$(document).ready(function() {
		var female_retirement = $('#female_retirement').val();
		console.log(female_retirement);

		$.ajax({
			type: "POST",
			url: "validateFemaleRetirement",
			data: {
				female_retirement: female_retirement
			},
        	success: function(response) {
				$('.invalid-feedback').html(response);
				if($.trim(response)) {
					$('#female_retirement').addClass('is-invalid');
				}
				else if (!$.trim(response)) {
					$('#female_retirement').removeClass('is-invalid');
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




/* function validateJobModal() {
	$(document).ready(function() {
		var job = $('#job').val();
		console.log(job);
						
		$.ajax({
			type: 'POST',
			data: {
				job: job
			},
			url: ' validateJob',
			success: function(response) {
				$('.invalid-feedback').html(response);
				if($.trim(response)) {
					$('#job').addClass('is-invalid');
				}
				else if (!$.trim(response)) {
					$('#job').removeClass('is-invalid');
				}
			},
			error:function() {}
		}); 
	}); 
}
*/


// Display Image Preview on file Upload
function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('.user-image').css('display' , 'block');
			$('#imgPlaceholder').attr('src', e.target.result);
		}
		reader.readAsDataURL(input.files[0]); // convert to base64 string
	}
}

$("#chooseFile").change(function () {
	readURL(this);
});



























 
		/* if(str.length > 12) {
			console.log(phoneOne);
			$('#phoneOne-feedback').html('Phone Number is too long');
			$('#phoneOne').addClass('is-invalid');
			$('#updateProfile').addClass('disabled');
			$('#profileForm').submit(function(e){
				$('#updateProfile').addClass('disabled');
				//alert('Validation Failed');
				return false;
			});
		}
		else {
			$('#phoneOne').removeClass('is-invalid');
			$('#profileForm').submit(function(e){
				$('#updateProfile').removeClass('disabled');
			});
		} */

















function validateFirstName(str) {
	$(document).ready(function() {
		var firstName = $('#firstName').val();
		console.log(firstName);

		if(firstName.length == 0){
			document.getElementById('namefeedback').innerHTML = 'Field cannot be empty!';
			$('#firstName').addClass('is-invalid');

			$('#profileForm').submit(function(e){
                alert('Validation Failed');
                e.preventDefault(e);
            });
			//alert('Field cannot be empty!');
			//document.getElementById("updateProfile").addEventListener("click", function(event){ event.preventDefault()})
		}

		//e.stopPropagation();

		/*document.getElementById('namefeedback').innerHTML = '';
		$('#firstName').removeClass('is-invalid');
		$('#profileForm').submit(function(e){
			e.stopPropagation();
		}); */

			
				
	/*	$.ajax({
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
		}); */
	});  
}






/*
$(document).ready(function() {
function validateFirstName(str) {
	
		console.log(str);
		var firstName = $('#firstName').val(); 

		if(str.length == 0){
			document.getElementById('namefeedback').innerHTML = 'yes';
		} /*else {
			// AJAX REQUEST
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					document.getElementById('firstName-feedback').innerHTML = this.responseText;
				}
			}
			xmlhttp.open("GET", "validation_helper.php?q="+str, true);
			xmlhttp.send();
		}

		$.ajax({
			type: 'POST',
			data: {
				deptName: str
			}, 
			url: '<?php echo URLROOT; ?>/app/helpers/validation_helper.php',
			
			success: function(data) {
			// $("#deptName-feedback").html(data);
			//$('#deptName-feedback').html('Department Name already exists');
			document.getElementById('deptName-feedback').innerHTML = this.responseText;
			},
			error:function() {
				// just in case posting your form failed
				alert( "Validation Failed." );

			}
		});  
	
}

});*/
/*

    function validateDeptName(str) {
        console.log(str);
        var deptName = $('#deptName').val(); 

        if(str.length == 0){
            document.getElementById('deptName-feedback').innerHTML = '';
        } else {
            // AJAX REQUEST
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    document.getElementById('deptName-feedback').innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "<?php echo URLROOT; ?>/app/helpers/validation_helper.php?q="+str, true);
            xmlhttp.send();
        }

        $.ajax({
            type: 'POST',
            data: {
                deptName: str
            }, 
            url: '<?php echo URLROOT; ?>/app/helpers/validation_helper.php',
            
            success: function(data) {
            $("#deptName-feedback").html(data);
            $('#deptName-feedback').html('Department Name already exists');
            document.getElementById('deptName-feedback').innerHTML = this.responseText;
            },
            error:function() {
                // just in case posting your form failed
                alert( "Validation Failed." );

            }
        });  
	}
	

	*/