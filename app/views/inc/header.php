<!DOCTYPE html>
<html lang="en">
<head>

<title><?= SITE_TITLE ?></title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<!-- CSS: Font Awesome -->
<link rel="stylesheet" href="<?=URL_ROOT?>/font-awesome-4.7.0/css/font-awesome.min.css">

<!-- CSS: Bootstrap 4.0 -->
<link rel="stylesheet" href="<?=URL_ROOT?>/css/bootstrap.min.css">

<!-- Custom CSS -->
<link rel="stylesheet" href="<?=URL_ROOT?>/css/main.css">
<link rel="stylesheet" href="<?=URL_ROOT?>/css/footer.css">
<link rel="stylesheet" href="<?=URL_ROOT?>/css/flash-messages.css">

</head>
<body>

<?php require_once APP_ROOT . "/views/inc/navbar.php"; ?>

<!-- It ends in the footer -->
<main class="container"> 

    <div class="row flash-messages-wrapper">
        <div class="col-lg-6 col-md-10 col-sm-12 mx-auto">
            <?php FlashMessage::displayAll() ?>
        </div>
    </div>