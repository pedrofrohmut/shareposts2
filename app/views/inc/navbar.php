<nav class="navbar navbar-expand-sm navbar-dark bg-dark">

    <div class="container">
        <a class="navbar-brand" href="<?=URL_ROOT?>">SharePosts</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">

            <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link" href="<?=URL_ROOT?>">Home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?=URL_ROOT?>/page/about">About</a>
            </li>         
            
            </ul>

            <ul class="navbar-nav navbar-right">

                <li class="nav-item">
                    <a class="nav-link" href="<?=URL_ROOT?>/user/register">
                        <i class="fa fa-user-plus"></i> Register
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?=URL_ROOT?>/user/login">
                        <i class="fa fa-sign-in" aria-hidden="true"></i> Login
                    </a>
                </li>         

            </ul>
        </div>
    </div>
</nav>
