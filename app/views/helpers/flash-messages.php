<?php
$messages = SessionManager::getFlashMessages();

foreach ($messages as $message => $class) :
?>

<div class="alert <?= $class ?? '' ?> alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <?= $message ?>
</div>

<?php
endforeach;

SessionManager::cleanFlashMessages();
?>