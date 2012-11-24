<?php
	if($this->action == 'finish') {
		$grid = 'grid_12';
		$hideSteps = true;
	}
	else {
		$grid = 'grid_8';
		$hideSteps = false;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Infinitas Installer :: <?php echo $title_for_layout; ?></title>
		<?php
			echo $this->Html->css('/theme/infinitas/css/install');
			echo $scripts_for_layout;
		?>
	</head>
	<body>
		<?php echo $this->Form->create('Install', array('id' => 'container', 'class' => 'container_12', 'url' => array('controller' => 'install', 'action' => 'index', $this->Wizard->activeStep()))) ?>
			<?php echo $this->Form->hidden('step', array('value' => $this->Wizard->activeStep())); ?>
			<h2 class="grid_12" id="header">Infinitas Logo Here</h2>
			<div class="clear"></div>
			<div class="<?php echo $grid; ?>" id="inner-container">
				<div class="<?php echo $grid; ?> alpha" id="inner-header">
					<h3 class="grid_5 alpha"><?php echo $title_for_layout; ?></h3>
					<div class="buttons grid_3 omega">
						<?php
							if($this->Wizard->stepNumber() > 1 && !isset($hidePrevious)) {
								echo $this->Form->button('Previous', array('name' => 'Previous', 'value' => 'Previous'));
							}
							if(!isset($hideNext)) {
								echo $this->Form->button('Next', array('name' => 'Next', 'value' => 'Next', 'disabled' => (isset($hasErrors) ? $hasErrors : false)));
							}
						?>
					</div>
				</div>
				<div class="clear"></div>
				<div class="<?php echo $grid; ?> alpha" id="content">
					<?php echo $content_for_layout; ?>
				</div>
				<div class="clear"></div>
				<?php if (!isset($hideNext) || !isset($hidePrevious)) { ?>
					<div class="<?php echo $grid; ?> alpha buttons" id="inner-footer">
						<?php
							if($this->Wizard->stepNumber() > 1 && !isset($hidePrevious)) {
								echo $this->Form->button('Previous', array('name' => 'Previous', 'value' => 'Previous'));
							}
							if(!isset($hideNext)) {
								echo $this->Form->button('Next', array('name' => 'Next', 'value' => 'Next', 'disabled' => (isset($hasErrors) ? $hasErrors : false)));
							}
						?>
					</div>
				<?php } ?>
			</div>
			<?php if(!$hideSteps) { ?>
				<div class="grid_3" id="steps">
					<h3>Installer progress</h3>
					<ul>
						<?php echo $this->Wizard->progressMenu($installerProgress, false, array('wrap' => 'li')) ?>
					</ul>
				</div>
			<?php } ?>
			<div class="clear"></div>
		</form>
	</body>
</html>