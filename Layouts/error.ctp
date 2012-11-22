<!DOCTYPE html>
<html lang="en">
	<head>
		<?php echo $this->element('Assets.frontend/html_header'); ?>
	</head>
	<body id="error">
		<div class="container">
			<?php
				echo $this->Session->flash();
				echo $this->Html->tag('div', implode('', array(
					$this->Html->tag('h1', $this->Html->image('Assets.infinitas/small.png') . __d('infinitas', 'Infinitas')),
					$this->Html->tag('hr'),
					$content_for_layout
				)), array('class' => 'content'));
			?>
		</div>
		<?php
			echo $this->Html->tag('div', implode('', array(
				$this->element('Assets.frontend/footer')
			)), array('class' => 'container'));

			echo $this->ModuleLoader->load('hidden', true),
				$this->fetch('scripts_for_layout'),
				$this->Html->script('Assets.3rd/less');
		?>
	</body>
</html>

