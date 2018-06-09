<?php require_once APP_ROOT . "/views/inc/header.php"; ?>

<?php $post = $data["post"]; ?>

<a href="<?=URL_ROOT?>/post/show/<?=$post->getId()?>" class="btn btn-secondary">
    <i class="fa fa-arrow-left"></i> Back
</a>

<div class="card card-body bg-light mt-5 mb-5">
    <h2 class="card-title my-3">Edit Your Post</h2>
    <p class="card-text mb-4">Please use this form to edit your post.</p>

    <form action="<?=URL_ROOT?>/post/edit/<?=$post->getId()?>" method="POST">
        <div class="form-group">
            <label class="ml-2">Title</label>
            <input type="text" name="title" 
            class="form-control form-control-lg <?=isInvalid($data["titleErr"])?>" value="<?=$post->getTitle()?>">
            <div class="invalid-feedback"><?=$data["titleErr"]?></div>
        </div>

        <div class="form-group">
            <label class="ml-2">Body</label>
            <textarea name="body" cols="30" rows="10" 
            class="form-control form-control-lg <?=isInvalid($data["bodyErr"])?>"><?=$post->getBody()?></textarea>
            <div class="invalid-feedback"><?=$data["bodyErr"]?></div>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fa fa-send"></i> Update Post
        </button>
    </form>
</div>

<?php require_once APP_ROOT . "/views/inc/footer.php"; ?>