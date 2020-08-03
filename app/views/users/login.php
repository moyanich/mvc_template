<?php require APPROOT . '/views/inc/header.php'; ?>

<section class="login-page">
        <div class="container">
            <div class="row">   
                <div class="col-md-6 offset-md-3">
                    <div class="card form-card">
                        <div class="card-header">
                            <h3>Login</h3>
                            <?php flashMessage('register_sucess'); ?>
                        </div>
                        <div class="card-body reg-form section--form_inner">
                            <form id="reg-form" name="reg-form" action="<?php echo URLROOT; ?>/users/login" method="POST">
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

                                <div class="form-group">
                                    <a href="<?php echo URLROOT; ?>/users/register" value="Login">Don't have an account? Register</a>
                                </div>

                                <div class="form-group col-md-6">
                            <input type="hidden" name="csrf_token" value="<?php echo $token; ?>" />
                            <input class="form-check-input" type="checkbox" value="" id="rememberme">
                            <label class="form-check-label" for="rememberme">Remember me</label>
                        </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>