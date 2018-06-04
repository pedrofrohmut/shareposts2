<div class="row">
    <div class="col-lg-6 col-md-8 col-sm-12 mx-auto">

        <h2 class="text-center mb-2">Join Us</h2>
        <p class="text-center my-5">Please fill up this form to register as a user and be a part of our community</p>

        <form action="<?=URL_ROOT?>/user/register" method="POST">

            <!-- Name -->
            <div class="form-group my-4">
                <label class="required sr-only">Name</label>
                <input type="text" name="name" class="form-control <?=isInvalid($data['nameErr'])?>" value="<?=$data['name']?>" placeholder="User Name (required)">
                <div class="invalid-feedback"><?=$data['nameErr']?></div>
            </div>

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

            <!-- Confirm Password -->
            <div class="form-group mb-5 mt-4">
                <label class="required sr-only">Confirm Password</label>
                <input type="password" name="confirmPassword" class="form-control <?=isInvalid($data['confirmPasswordErr'])?>" value="<?=$data['confirmPassword']?>" placeholder="Confirm Password (required)">
                <div class="invalid-feedback"><?=$data['confirmPasswordErr']?></div>
            </div>

            
            
            <div class="row">                
                <div class="col-md-6 col-sm-12">                    
                    <!-- Form Check -->
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input">
                        <label for="form-check-label">
                            Agree to <strong>terms and conditions</strong>
                        </label>
                    </div>                    
                </div>

                <div class="col-md-6 col-sm-12 float-md-left">
                    <!-- Submit -->
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fa fa-paper-plane" aria-hidden="true"></i> Register
                    </button>
                </div>
            </div>            
        </form>

    </div>
</div>
