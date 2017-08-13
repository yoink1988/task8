<?php

function templateRender($array)
{
	$template = file_get_contents(TEMPLATE);
	foreach($array as $key => $val)
	{
		$template = str_replace($key, $val, $template);
	}
	echo $template;
   }


    function makeDl(array $data)
    {
        if(!empty($data))
        {
            $dl = '<dl>';
            foreach($data as $dt)
            {
                $dl .='<dt><a href='.$dt['link'].'>'.$dt['linkText'].'</a></dt><dd>'.$dt['details'].'</dd>';
            }
            $dl .='</dl>';
        }
        return $dl;
    }

	function makeList(array $data)
    {
		$arr['%out%'] = '';
        foreach($data as $row)
        {
            $arr['%out%'] .='<div class="row" style="background: #d5ecf4; border-radius:6px" >'
					. '<div class="col-md-1" style="background: #d5ecf4; border-radius:6px; " ><p>'
					. '<a href = '.$row['link'].'>'.$row['linkText'].'</a></p>'
					. '<p>'.$row['details'].'</p></div></div>';
        }
        return $arr['%out%'];

    }