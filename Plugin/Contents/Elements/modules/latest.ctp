<?php
	$defaultConfig = array(
		'title' => 'Latest Content',
		'limit' => 3,
		'title_length' => 60
	);
	$config = array_merge($defaultConfig, $config);

	if(isset($config['model']) && $config['model'] === true) {
		$config['model'] = implode('.', current(array_values($this->request->models)));
	}

	if(isset($config['category']) && $config['category'] === true && !empty($this->request->params['category'])) {
		$config['category'] = $this->request->params['category'];
	}

	if(!empty($config['model'])) {
		list($plugin,) = pluginSplit($config['model']);
		if($plugin != $this->plugin) {
			return;
		}
	}

	$model = null;
	$plugin = $this->request->plugin;
	if(!empty($config['model']) && is_string($config['model'])) {
		list($plugin, $model) = pluginSplit($config['model']);
	}

	if(empty($latestContents)) {
		try {
			$latestContents = ClassRegistry::init('Contents.GlobalContent')->find(
				!empty($findMethod) ? $findMethod : 'latestList',
				array(
					'limit' => $config['limit'],
					'model' => !empty($config['model']) ? $config['model'] : null,
					'category' => !empty($config['category']) ? $config['category'] : null
				)
			);
		} catch(Exception $e) {
		}
	}

	if(empty($latestContents)) {
		return;
	}

	if(empty($config['model'])) {
		$config['model'] = implode('.', current(array_values($this->request->models)));
	}
	if(empty($model)) {
		list(,$model) = pluginSplit($config['model']);
	}
	if(empty($plugin)) {
		list($plugin,) = pluginSplit($config['model']);
	}

	foreach($latestContents as &$latestContent) {
		$latestContent[$model] = &$latestContent['GlobalContent'];
		$url = $this->Event->trigger(
			current(pluginSplit($latestContent['GlobalContent']['model'])) . '.slugUrl',
			array('data' => $latestContent)
		);

		$latestContent = $this->Html->tag('div', implode('', array(
			$this->Html->tag('h3', $latestContent['GlobalContent']['title']),
			$latestContent['GlobalContent']['introduction'],
			$this->Html->tag('p', $this->Html->link(Configure::read('Website.read_more'), current(current($url)), array(
				'class' => 'btn btn-small'
			)))
		)), array('class' => 'span4'));
	}
	echo $this->Html->tag('div', implode('', $latestContents), array('class' => 'row'));