<?php
error_reporting(0);
ini_set('display_errors', 0);
if ($errors && count($errors) > 0) :

?>

  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>

<?php  endif ?>
