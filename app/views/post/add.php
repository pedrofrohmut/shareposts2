<?php require_once APP_ROOT . "/views/inc/header.php"; ?>

<a href="<?=URL_ROOT?>" class="btn btn-secondary">
  <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
</a>

<div class="card card-body bg-light mt-5">
  
  <h2>Add Post</h2>
  <p>Create a post with this form</p>

  <form action="<?=URL_ROOT?>/post/add" method="POST">
    <div class="form-group">
      <label for="">Title: <sup>*</sup></label>
      <input type="text" name="title" 
      class="form-control form-control-lg <?=isInvalid($data["titleErr"])?>" value="<?=$data["title"]?>">
      <span class="invalid-feedback"><?=$data["titleErr"]?></span>
    </div>
    
    <div class="form-group">
      <label for="">Body: <sup>*</sup></label>
      <textarea name="body" rows="10" cols="30" 
      class="form-control form-control-lg <?=isInvalid($data["bodyErr"])?>"><?=$data["body"]?></textarea>
      <span class="invalid-feedback"><?=$data["bodyErr"]?></span>
    </div>

    <button type="submit" class="btn btn-primary">
      <i class="fa fa-send"></i> Submit New Post
    </button>
  </form>
</div>

<?php require_once APP_ROOT . "/views/inc/footer.php"; ?>