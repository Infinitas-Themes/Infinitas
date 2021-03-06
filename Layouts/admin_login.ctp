<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php
			echo $this->Html->charset();
			echo $this->Html->tag('title', sprintf('Infinitas Admin :: %s', $title_for_layout));
            echo $this->Html->meta('icon');

			echo $this->Compress->css(array(
				'/theme/infinitas/less/admin.less',
				'stylesheet/less', array(
					'ext' => '.less'
				)
			));
			echo $this->Compress->css($css_for_layout);

			echo $this->Html->scriptBlock("Infinitas = {params:{prefix: null}};\nif (Infinitas.base != '/') {Infinitas.base = Infinitas.base + '/';}\n");
		?>
	</head>
	<body id="login">
		<div class="container">
			<?php
				echo $this->Session->flash();
				echo $this->Html->tag('div', implode('', array(
					$this->Html->tag('h1', $this->Html->image('Assets.infinitas/small.png') . __d('infinitas', 'Infinitas')),
					$this->Html->tag('hr'),
					$content_for_layout
				)), array('class' => 'login'));
			?>
		</div>
		<?php
			echo $this->element('Assets.admin_footer');
			echo $this->ModuleLoader->load('hidden', true),
				$this->Compress->script($js_for_layout),
				$this->fetch('scripts_for_layout');
		?>
	</body>
</html>