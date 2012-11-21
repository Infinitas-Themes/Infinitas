<?php
	echo $this->Html->tag('hr');
	echo $this->Html->tag('footer', $this->Html->tag('p', sprintf('&copy; %s %d', Configure::read('Website.name'), date('Y'))));
	