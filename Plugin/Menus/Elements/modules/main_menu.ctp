<?php
	$config = array_merge(array(
		'menu' => null,
		'type' => null
	), $config);
	if(empty($config['menu'])) {
		throw new InvalidArgumentException(__d('menus', 'No menu configured'));
	}

	echo $this->Menu->bootstrapNav(ClassRegistry::init('Menus.MenuItem')->getMenu($config['menu']));