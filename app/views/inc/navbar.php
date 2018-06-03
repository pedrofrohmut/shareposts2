<nav class="navbar navbar-inverse">

  <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?=URL_ROOT?>">SharePosts</a>
        </div>

        <div class="collapse navbar-collapse" id="main-nav">
            <ul class="nav navbar-nav">
                <li><a href="<?=URL_ROOT?>">Index</a></li>
                <li><a href="<?=URL_ROOT?>/page/about">About</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="<?=URL_ROOT?>/user/register">
                        <i class="fa fa-user-plus"></i> Register
                    </a>
                </li>
                <li>
                    <a href="<?=URL_ROOT?>/user/login">
                        <i class="fa fa-sign-in" aria-hidden="true"></i> Login
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>