<?php require APPROOT . '/views/inc/header.php'; ?>

<section class="register-page section--form">
    <div class="container">
        <div class="row">   
            <div class="col-md-6 offset-md-3 reg-form section--form_inner">
                <?php flashMessage('register_failure'); ?>
                <h2>Create An Account</h2>
                <p>Please fill out this form to register with us</p>
                <form id="reg-form" name="reg-form" action="<?php echo URLROOT; ?>/users/register" method="POST">
                    <div class="form-group">
                        <label for="inputUsername">Username<sup>*</sup></label>
                        <input type="text" name="username" class="form-control <?php echo (!empty($data['username_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['username']; ?>" value="<?php echo $data['username']; ?>" />
                        <?php echo (!empty($data['username_err'])) ? '<span class="invalid-feedback">' . $data['username_err'] . '</span>' : '' ; ?>
                        
                    </div>

                    <div class="form-group">
                        <label for="inputEmail">Email address<sup>*</sup></label>
                        <input type="email" name="email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['email']; ?>" />
                        <?php echo (!empty($data['email_err'])) ? '<span class="invalid-feedback">' . $data['email_err'] . '</span>' : '' ; ?>
                    </div>
                    
                    <hr/>

                    <div class="form-group">
                        <label for="inputPassword">Password<sup>*</sup></label>
                        <input type="password" name="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['password']; ?>" />
                        <?php echo (!empty($data['password_err'])) ? '<span class="invalid-feedback">' . $data['password_err'] . '</span>' : '' ; ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputConfirmPassword">Confirm password<sup>*</sup></label>
                        <input type="password" name="passwordConfirm" class="form-control <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['confirm_password']; ?>"/>
                        <?php echo (!empty($data['confirm_password_err'])) ? '<span class="invalid-feedback">' . $data['confirm_password_err'] . '</span>' : '' ; ?>
                    </div>

                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-primary" value="Register" />
                    </div>

                    <div class="form-group">
                        <a href="<?php echo URLROOT; ?>/users/login" class="text-white value="Login">Already have an account? Sign In</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>