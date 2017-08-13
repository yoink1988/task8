<?php
//echo __DIR__;

echo '<pre>';
include_once '/libs/config.php';
include_once ROOT_DIR.'/libs/functions.php';
include_once ROOT_DIR.'/libs/MyCurl.php';


$output = array('%out%' => '');

if(!empty($_POST['request']))
{

	$ch = new myCurl($_POST['request']);

	$data = $ch->getCurl();
	$dom = new DOMDocument();
	@$dom->loadHTML($data);

	$nodes = $dom->getElementsByTagName('div');
	$dataArr = array();
	$i = 0;
	foreach ($nodes as $node)
	{
		
		if ($node->getAttribute('class') == 'rc' && $node->childNodes->item(1)->firstChild->childNodes->item(1))
		{
			$dataArr[$i]['link'] = $node->firstChild->firstChild->getAttribute('href');
			$dataArr[$i]['linkText'] = $node->firstChild->firstChild->nodeValue;
			$dataArr[$i]['details'] = $node->childNodes->item(1)->firstChild->childNodes->item(1)->nodeValue;
			$i++;
		}
	
	}

	if (!empty($dataArr))
	{
		$output['%out%'] = makeList($dataArr, false);
	}
	

}
	templateRender($output);
