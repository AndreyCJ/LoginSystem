<? $get_errors = $_SESSION['errors'] ?>
<? if(count($get_errors) > 0) : ?>

 	<div class="error">
	 <?php foreach ($get_errors as $error) : ?>
			<p><?php echo $error ?></p>
			<? unset($_SESSION['errors']);?>
  	<?php endforeach ?>
 	</div>

<? endif ?>
