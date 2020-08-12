<?php require APPROOT . '/views/inc/header.php'; ?>

<section class="login-page">
    <div class="container">
        <div class="row">   
            <div class="col-md-6 offset-md-3">
                <div class="card form-card shadow">
                    <div class="card-header">
                        <h3>Login</h3>
                        <?php flashMessage('register_sucess'); ?>
                    </div>
                    <div class="card-body reg-form section--form_inner">
                        <form id="reg-form" name="reg-form" action="<?php echo URLROOT; ?>/users/login" method="POST">
                            <?php flashMessage('invalid_credentials'); ?>
                            <?php flashMessage('login_failed'); ?>
                            <div class="form-group">
                                <label for="inputUsername">Username<sup>*</sup></label>
                                <input type="text" name="username" class="form-control <?php echo (!empty($data['username_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['username']; ?>" value="<?php echo $data['username']; ?>" />
                                <?php echo (!empty($data['username_err'])) ? '<span class="invalid-feedback">' . $data['username_err'] . '</span>' : '' ; ?>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword">Password<sup>*</sup></label>
                                <input type="password" name="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['password']; ?>" />
                                <?php echo (!empty($data['password_err'])) ? '<span class="invalid-feedback">' . $data['password_err'] . '</span>' : '' ; ?>
                            </div>
                            
                            <div class="form-group text-center">
                                <input type="submit" name="btn-login" class="btn btn-primary" value="Login" />
                            </div>

                            <div class="form-group col-md-6">
                                <input type="checkbox" class="form-check-input" name="remember" id="rememberme">
                                <label class="form-check-label" for="rememberme">Remember me</label>
                            </div>

                            <div class="form-group">
                                <a href="<?php echo URLROOT; ?>/users/register" value="Login">Don't have an account? Register</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>