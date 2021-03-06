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
			$css_for_layout = array_merge($css_for_layout, array(
				'Assets.jquery_ui_bootstrap'
			));
			echo $this->Compress->css($css_for_layout);

			echo $this->Html->scriptBlock(sprintf(
				"Infinitas = %s;\nif (Infinitas.base != '/') {Infinitas.base = Infinitas.base + '/';}\n",
				json_encode(isset($infinitasJsData) ? $infinitasJsData : '')
			));
		?>
	</head>
	<body>
		<?php
			echo $this->ModuleLoader->load('top', true);
		?>
		<div id="wrap" class="container-fluid">
			<?php
				echo $this->Html->tag('div', implode('', array(
					$this->Html->tag('div', $this->ModuleLoader->load('left', true), array(
						'class' => 'span2'
					)),
					$this->Html->tag('div', implode('', array(
						$this->Session->flash(),
						$content_for_layout,
						$this->ModuleLoader->load('bottom', true)
					)), array('class' => array('span10', $class_name_for_layout)))
				)), array('class' => 'row-fluid'));
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