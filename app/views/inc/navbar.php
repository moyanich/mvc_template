
<!-- Navigation -->
<nav class="navbar navbar-light navbar-expand-lg bg-light">
    <a class="navbar-brand" href="<?php echo $urlchange = isUserRegistered() ? URLROOT . '/main' : URLROOT ?>"><?php echo SITENAME; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>/page/about">About</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <?php if(isUserRegistered()) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Login</a>
                </li>
            <?php endif; ?>
        </ul>
        
    </div>
</nav>
