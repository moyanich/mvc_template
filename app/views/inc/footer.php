        </div>
    </div>
    
    
    <footer class="footer bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
            <ul class="list-inline mb-2">
                <li class="list-inline-item">
                <a href="about">About</a>
                </li>
                <li class="list-inline-item">⋅</li>
                <li class="list-inline-item">
                <a href="#">Contact</a>
                </li>
                <li class="list-inline-item">⋅</li>
                <li class="list-inline-item">
                <a href="#">Terms of Use</a>
                </li>
                <li class="list-inline-item">⋅</li>
                <li class="list-inline-item">
                <a href="#">Privacy Policy</a>
                </li>
            </ul>
            <p class="text-muted small mb-4 mb-lg-0">© Your Website 2020. All Rights Reserved. Human Resource Management Sysytem by </p>
            <p>Version: <strong><?php echo APPVERSION; ?></strong></p>
            </div>
            <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
            <ul class="list-inline mb-0">
                <li class="list-inline-item mr-3">
                <a href="#">
                    <i class="fab fa-facebook fa-2x fa-fw"></i>
                </a>
                </li>
                <li class="list-inline-item mr-3">
                <a href="#">
                    <i class="fab fa-twitter-square fa-2x fa-fw"></i>
                </a>
                </li>
                <li class="list-inline-item">
                <a href="#">
                    <i class="fab fa-instagram fa-2x fa-fw"></i>
                </a>
                </li>
            </ul>
            </div>
        </div>
    </div>
</footer>


<?php if(isset($_SESSION['user_admin']) ) : ?>
            
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php endif; ?>


</div>

<script src="<?php echo URLROOT; ?>/vendor/bootstrap/bootstrap.min.js"></script>

<!-- DataTables JavaScript -->
<!--<script src="<?php echo URLROOT; ?>/vendor/dataTables/js/jquery.dataTables.min.js"></script>
	
<script src="<?php echo URLROOT; ?>/vendor/dataTables/js/dataTables.bootstrap4.min.js"></script>  -->

<!-- DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>


 
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>




 
<script src="<?php echo URLROOT; ?>/js/main.js"></script>

<script>
   /* $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        }); 
    }); */
</script>



</body>
</html>