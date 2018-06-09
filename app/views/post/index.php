<?php require_once APP_ROOT . "/views/inc/header.php"; ?>

<div class="row mb-5">
    <div class="col-sm-6">
        <h1>Posts Feed</h1>
    </div>
    <div class="col-sm-6">
        <a href="<?=URL_ROOT?>/post/add" class="btn btn-primary pull-right">
            <i class="fa fa-pencil"></i> Add Post
        </a>
    </div>
</div>
<div class="row justify-content-center">
    <!-- <div class="col-lg-0">
        <h3>SIDE BAR 1</h3>
    </div>     -->
    <div class="col-lg-10 col-md-11 col-sm-12">

        <?php foreach($data['posts'] as $post) :?>

            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="card-title"><?=$post->getTitle()?></h4>

                    <p class="card-text py-2 text-justify">
                        <?= StringHandler::limitTheDisplayText($post->getBody(), 200) ?>
                    </p> 

                    <a href="<?=URL_ROOT?>/post/show/<?=$post->getId()?>" class="btn btn-info btn-sm">
                        <i class="fa fa-file-text-o pr-1"></i> Read More
                    </a>

                    <p class="pull-right text-secondary font-weight-light">
                        Written by <?=$post->getUser()->getName()?> on <?=$post->getCreatedAt()?>
                    </p>
                </div>
            </div>

        <?php endforeach;?>

    </div>
    <!-- <div class="col-lg-2">
        <h3>SIDE BAR 2</h3>
    </div> -->
</div>

<?php require APP_ROOT . "/views/helpers/go-to-top-btn.php"; ?>

<?php require_once APP_ROOT . "/views/inc/footer.php"; ?>