<?php
echo $this->Html->tag('div',
	$this->Html->tag('div',
		$this->Html->tag('div', implode('', array(
			$this->Html->link(Configure::read('Website.name'), '/', array(
				'class' => 'brand'
			)),
			$this->ModuleLoader->load('top')
		)), array('class' => 'container')),
	array('class' => 'navbar-inner')),
array('class' => 'navbar navbar-fixed-top'));