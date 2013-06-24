<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>TestJs Plugin Test Runner</title>
	<?php echo $this->Html->css($testJs->cssFiles()); ?>
</head>
<body>
	<?php echo $testJs->markup(); ?>

	<?php echo $this->fetch('app_js'); ?>

	<?php echo $this->Html->script($testJs->jsFiles()); ?>

	<?php echo $testJs->extras(); ?>

	<?php echo $this->fetch('test_js'); ?>

	<?php echo $testJs->startup(); ?>
</body>
</html>
