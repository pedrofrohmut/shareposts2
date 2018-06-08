<?php require_once APP_ROOT . "/views/inc/header.php"; ?>
<div class="row">
    <div class="col-lg-6 col-md-8 col-sm-12 mx-auto">

        <?php FlashMessage::displayAll() ?>

        <h2 class="text-center">Welcome Back</h2>
        <p class="mb-5 mt-4 text-center">Please fill in your credentials to log in</p>

        <form action="<?=URL_ROOT?>/user/login" method="POST">

            <!-- E-mail -->
            <div class="form-group my-4">
                <label class="required sr-only">E-mail</label>
                <input type="email" name="email" class="form-control <?=isInvalid($data['emailErr'])?>" value="<?=$data['email']?>" placeholder="E-mail (required)">
                <div class="invalid-feedback"><?=$data['emailErr']?></div>
            </div>

            <!-- Password -->
            <div class="form-group my-4">
                <label class="required sr-only">Password</label>
                <input type="password" name="password" class="form-control <?=isInvalid($data['passwordErr'])?>" value="<?=$data['password']?>" placeholder="Password (required)">
                <div class="invalid-feedback"><?=$data['passwordErr']?></div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-12 ml-auto">

                    <!-- Remember Me -->
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input">
                        <label for="form-check-label">
                            Remember Me
                        </label>
                    </div>
                    
                </div>

                <div class="col-md-6 col-sm-12 ml-auto">
                    
                    <!-- Submit -->
                    <button type="submit" class="btn btn-primary pull-right btn-block">
                        <i class="fa fa-paper-plane" aria-hidden="true"></i> Log in
                    </button>                    

                </div>
            </div>            
        </form>

    </div>
</div>
<?php require_once APP_ROOT . "/views/inc/footer.php"; ?>