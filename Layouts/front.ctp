
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php echo $this->element('Assets.frontend/html_header'); ?>
	</head>
	<body>
		<?php
			echo $this->element('Assets.frontend/header');

			echo $this->Html->tag('div', implode('', array(
				$this->Session->flash(),
				$this->ModuleLoader->load('custom2'),
				$content_for_layout,
				$this->ModuleLoader->load('bottom')
			)), array('class' => 'container'));

			echo $this->element('Assets.frontend/footer');
		?>
	</body>
</html>