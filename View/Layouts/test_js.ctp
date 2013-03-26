<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>TestJs Plugin Test Runner</title>
	<?php echo $this->Html->css('/test_js/css/mocha'); ?>
</head>
<body>
	<div id="mocha"></div>
	<?php echo $this->fetch('app_js'); ?>
	<?php foreach (array('chai.js', 'sinon-chai.js', 'sinon.js', 'mocha.js') as $lib): ?>
		<?php echo $this->Html->script("/test_js/js/$lib"); ?>
	<?php endforeach; ?>
	<?php if (Configure::read('TestJs.assert')): ?>
		<script>window.assert = chai.assert;</script>
	<?php endif; ?>
	<?php if (Configure::read('TestJs.expect')): ?>
		<script>window.expect = chai.expect;</script>
	<?php endif; ?>
	<?php if (Configure::read('TestJs.should')): ?>
		<script>chai.should();</script>
	<?php endif; ?>
	<script>mocha.setup('bdd')</script>
	<?php echo $this->fetch('test_js'); ?>
	<script>mocha.run();</script>
</body>
</html>