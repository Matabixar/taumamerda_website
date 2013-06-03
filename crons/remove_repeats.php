<?php 

error_reporting(0);

require("../functions.php");

$sql = "SELECT * FROM posts_bck_ds31052013";
$result = query($sql);

$arrVideos = orderBigArray(deCodeArray($result));

$arrVideoTags = array();

//bora obter as video tags dos videos
for ($i=0; $i < count($arrVideos); $i++) { 
	$obj_aux = "";
	if(strpos($arrVideos[$i]['url'], "youtube")) {
		$obj_aux['parent'] = "youtube";
		$obj_aux['videoTag'] = getStringBetween($arrVideos[$i]['url'], "embed/","?rel");

	} else if(strpos($arrVideos[$i]['url'], "dailymotion")) {
		$obj_aux['parent'] = "dailymotion";
		$obj_aux['videoTag'] = getStringBetween($arrVideos[$i]['url'], "video/","?");

	} else if(strpos($arrVideos[$i]['url'], "videolog")) {
		$obj_aux['parent'] = "videolog";
		$obj_aux['videoTag'] = getStringBetween($arrVideos[$i]['url'], "id_video=","&");

	} else if(strpos($arrVideos[$i]['url'], "liveleak")) {
		$obj_aux['parent'] = "liveleak";
		$obj_aux['videoTag'] = getStringBetween($arrVideos[$i]['url'], "=","=");
	}
	if($obj_aux != "") {
		$obj_aux['id'] = $arrVideos[$i]['id'];
		$obj_aux['url'] = $arrVideos[$i]['url'];
		array_push($arrVideoTags, $obj_aux);
	}
}

//ximbora ver se temos entradas repetidas e po-las num array
$arrVideoRepeats = array();
for ($r=0; $r < count($arrVideoTags); $r++) { 
	for ($w=0; $w < count($arrVideoTags); $w++) {
		if($r != $w) {
			if($arrVideoTags[$r]['videoTag'] === $arrVideoTags[$w]['videoTag']) {
				if($arrVideoTags[$r]['parent'] === $arrVideoTags[$w]['parent']) {
					if($arrVideoTags[$r]['id'] != "BUSTED" && $arrVideoTags[$w]['id'] != "BUSTED") {
						$arrVideoTags[$r]['compared_to'] = $arrVideoTags[$w];
						array_push($arrVideoRepeats, $arrVideoTags[$r]);
						$arrVideoTags[$r]['id'] = "BUSTED";
						$arrVideoTags[$w]['id'] = "BUSTED";
					}
				}
			}
		}
	}
}

//agora era lindo pegar neste array e ir buscar a entrada com id caçado
//nesta entrada vamos decode e adicionar status = 0 ao array deste video
print_r($arrVideoRepeats);die;



?>