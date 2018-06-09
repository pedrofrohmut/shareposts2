<?php require_once APP_ROOT . "/views/inc/header.php"; ?>

<?php $post = $data["post"]; ?>

<a href="<?=URL_ROOT?>/post" class="btn btn-secondary">
    <i class="fa fa-arrow-left"></i> Back
</a>

<div class="row">
    <div class="col-lg-10 col-md-12 col-sm-12 mx-auto">    
        <div class="card-body">
            <h4 class="card-title"><?=$post->getTitle()?></h4>

            <p class="text-secondary font-weight-light">
                Writen by <?=$post->getUser()->getName()?> on <?=$post->getCreatedAt()?>
            </p>

            <p class="card-text pt-2 pb-4 text-justify"><?=$post->getBody()?></p>

            <?php if (SessionManager::isCurrentUserThePostOwner($post)) : ?>
                <form action="<?=URL_ROOT?>/post/edit/<?=$post->getId()?>" method="GET" class="pull-left">
                    <button type="submit" class="btn btn-secondary">
                        <i class="fa fa-pencil"></i> Edit
                    </button>
                </form>

                <form action="<?=URL_ROOT?>/post/delete/<?=$post->getId()?>" method="POST" class="pull-right">
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash"></i> Delete
                    </button>                
                </form>
            <?php endif; ?>
        </div>    
    </div>
</div>

<?php require_once APP_ROOT . "/views/inc/footer.php"; ?>