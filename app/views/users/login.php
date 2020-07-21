<?php require APPROOT . '/views/inc/header.php'; ?>

<section class="login-page section--form">
        <div class="container">
            <div class="row">   
                <div class="col-md-6 offset-md-3 reg-form section--form_inner">
                    <h3>Register User</h3>

                    <form id="reg-form" name="reg-form" action="<?php echo URLROOT; ?>/users/login" method="POST">

                        <div class="form-group">
                            <label for="inputUsername" class="sr-only">Username</label>
                            <input type="text" id="username" name="username" class="form-control <?php echo (!empty($data['username_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['username']; ?>" placeholder="Username*" required autofocus/>
                            <?php echo (!empty($data['username_err'])) ? '<span class="invalid-feedback">' . $data['username_err'] . '</span>' : '' ; ?>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword" class="sr-only">Password</label>
                            <input type="password" id="inputPassword" name="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : '' ; ?>" placeholder="Password*" required />
                            <?php echo (!empty($data['password_err'])) ? '<span class="invalid-feedback">' . $data['password_err'] . '</span>' : '' ; ?>


                            <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                        </div>
                        
                        <div class="form-group text-center">
                            <input type="submit" name="btn-login" class="btn btn-primary" value="Login" />
                        </div>

                        <div class="form-group">
                            <a href="<?php echo URLROOT; ?>/users/register" class="text-white value="Login">Don't have an account? Register</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>

</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>