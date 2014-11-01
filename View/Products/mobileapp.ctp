<?php 
	foreach($tes as &$te):
		$te['Product']['description'] = $this->Markdown->transform($te['Product']['description']);
	endforeach;

	echo json_encode($tes);
