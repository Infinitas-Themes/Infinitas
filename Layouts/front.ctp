
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

			echo $this->Html->tag('div', implode('', array(
				$this->element('Assets.frontend/footer')
			)), array('class' => 'container'));

			echo $this->ModuleLoader->load('hidden', true),
				$this->Compress->script($js_for_layout),
				$this->fetch('scripts_for_layout');
		?>
	</body>
</html>