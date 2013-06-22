<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>TestJs Plugin Test Runner</title>
	<?php foreach ($testJs->cssFiles() as $file): ?>
		<?php echo $this->Html->css("/test_js/css/$file"); ?>
	<?php endforeach; ?>
</head>
<body>
	<?php echo $testJs->markup(); ?>

	<?php echo $this->fetch('app_js'); ?>

	<?php foreach ($testJs->jsFiles() as $lib): ?>
		<?php echo $this->Html->script("/test_js/js/$lib"); ?>
	<?php endforeach; ?>

	<?php echo $testJs->extras(); ?>

	<?php echo $this->fetch('test_js'); ?>

	<?php echo $testJs->runner(); ?>
</body>
</html>
