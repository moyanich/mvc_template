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

    <!--<script src="<?php echo URLROOT; ?>/vendor/bootstrap/bootstrap.min.js"></script>-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <!-- DataTables JavaScript -->
    <!--<script src="<?php echo URLROOT; ?>/vendor/dataTables/js/jquery.dataTables.min.js"></script>
        
    <script src="<?php echo URLROOT; ?>/vendor/dataTables/js/dataTables.bootstrap4.min.js"></script>  -->

    <!-- DataTables JavaScript -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/af-2.3.5/b-1.6.3/b-colvis-1.6.3/b-print-1.6.3/fh-3.1.7/r-2.2.5/rg-1.1.2/rr-1.2.7/sc-2.0.2/sp-1.1.1/sl-1.3.1/datatables.min.js"></script>
 
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