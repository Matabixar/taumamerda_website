<?php 

	function deCodeArray($arr)
	{
		$arrReturn = array();
		for ($i=0; $i < count($arr['tmp']); $i++) { 
			$arrReturn[$i]['urls'] = unserialize(base64_decode($arr['tmp'][$i]['urls']));
			$arrReturn[$i]['id'] = $arr['tmp'][$i]['id'];
		}
		return $arrReturn;
	}

	function deCodeString($str)
	{
		$arrReturn = array();
		$arrReturn[0]['urls'] = unserialize(base64_decode($str));
		$arrReturn[0]['id'] = "NONE";
		return $arrReturn;
	}

	function orderBigArray($arrVideos) 
	{
		$arrOutPut = array(); 
		for ($i=0; $i < count($arrVideos); $i++) { 
			for ($j=0; $j <count($arrVideos[$i]['urls']) ; $j++) { 
				for ($k=0; $k < count($arrVideos[$i]['urls'][$j][0]); $k++) {
					$obj_aux['url'] = $arrVideos[$i]['urls'][$j][0][$k]['url'];
					$obj_aux['length'] = $arrVideos[$i]['urls'][$j][0][$k]['length'];
					$obj_aux['id'] = $arrVideos[$i]['id'];
					array_push($arrOutPut, $obj_aux);
				}
			}
		}
		return $arrOutPut;
	}

	function getVideoTag($url, $src) {
		if($src=='youtube'){return getStringBetween($url, 'http://www.youtube.com/embed/', '?');}
		else if($src=='vimeo'){echo $url;die;return getStringBetween($url, '', '');}
		else if($src=='dailymotion'){echo $url;die;return getStringBetween($url, '', '');}

		return false;
	}

	function getStringBetween($content,$start,$end){
	    $r = explode($start, $content);
	    if (isset($r[1])){
	        $r = explode($end, $r[1]);
	        return $r[0];
	    }
	    return '';
	}

	// function global para queries	
	function query($query){

		//var
		// $global['server']='localhost';
		// $global['bd']='db_scrapper';
		// $global['user']='root';
		// $global['pass']='';
		$global['server']='mysql.boxhost.me';
		$global['bd']='u470580216_main';
		$global['user']='u470580216_talha';
		$global['pass']='rdcrdc081081';

		//connect
		$dbh=mysql_pconnect($global['server'], $global['user'], $global['pass']) or die("erro mysql_pconnect: " . mysql_error());
		mysql_select_db ($global['bd']) or die("erro mysql_select_db: " . mysql_error());

		$i=0;
		$tmp='';
		$result = mysql_query($query) or die("erro mysql_queryl: " . mysql_error());
		
		if(substr($query,0,6)=='SELECT')
		{
			while($row = mysql_fetch_assoc($result))
			{
				$tmp[$i]=$row;
				$i++;
			}
		}

		$obj_return['result'] = $result;
		$obj_return['tmp'] = $tmp;
		$obj_return['query'] = $query;

		return $obj_return;
	}

	function save2file($stringData, $myFile)
	{
		if(file_exists($myFile)){
			$fh = fopen($myFile, 'a');
		} else {
			$fh = fopen($myFile, 'w');
		}
		fwrite($fh, $stringData);
		fclose($fh);

		return;
	}
?>