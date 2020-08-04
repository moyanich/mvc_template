<?php

class Validation_helper extends Controller {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }
    

    public function validateDeptName($deptName) {

        if(filter_has_var(INPUT_POST, $deptName)) {
            echo 'data found';
        }
        else {
            echo 'no dat';
        }

    }


}

?>

<?php /*
<script>
function validateDeptName() {
    var deptName = $('#deptName').val();
   
    $.ajax({
        type: 'POST',
        data: {
            deptName: deptName
        }, 
        url: '<?php echo URLROOT; ?>/app/controllers/departments.php',
        
        success: function(data) {
           // $("#deptName-feedback").html(data);
           $('#deptName-feedback').html('Department Name already exists');
        },
        error:function() {
            // just in case posting your form failed
            alert( "Validation Failed." );

        }
       

    }); 
}
</script>

*/

?>