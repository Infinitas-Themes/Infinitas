<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<?php
	echo $this->Html->charset();
	echo $this->Html->tag('title', sprintf('Infinitas Admin :: %s', !empty($title_for_layout) ? $title_for_layout : null));
	echo $this->Html->meta('icon');
	echo $this->Compress->css(array(
		'/theme/infinitas/less/front.less',
		'stylesheet/less', array(
			'ext' => '.less'
		)
	));
	if(!empty($css_for_layout)) {
		echo $this->Compress->css($css_for_layout);
	}

	echo $this->Html->scriptBlock(sprintf(
		"Infinitas = %s;\nif (Infinitas.base != '/') {Infinitas.base = Infinitas.base + '/';}\n",
		json_encode(!empty($infinitasJsData) ? $infinitasJsData : '')
	));
?>