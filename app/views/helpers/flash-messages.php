<?php
$arr = $_SESSION['flashMessages'] ?? [];

foreach ($arr as $message => $class) :
    // echo "<div class=\"$class>$message</div>";
?>

<div class="alert <?= $class ?? '' ?> alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <?= $message ?>
</div>

<?php
endforeach;

$_SESSION['flashMessages'] = null;
?>