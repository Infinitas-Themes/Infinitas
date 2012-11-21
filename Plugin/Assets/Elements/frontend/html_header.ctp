<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet/less" type="text/css" href="/theme/infinitas/less/front.less">
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<?php
	echo $this->Html->charset();
	echo $this->Html->tag('title', sprintf('Infinitas Admin :: %s', $title_for_layout));
	echo $this->Html->meta('icon');
	echo $this->Compress->css($css_for_layout);

	echo $this->Html->scriptBlock(sprintf(
		"Infinitas = %s;\nif (Infinitas.base != '/') {Infinitas.base = Infinitas.base + '/';}\n",
		json_encode(isset($infinitasJsData) ? $infinitasJsData : '')
	));
?>