<?php 
require("../functions.php");



$vSeen = explode(", ", base64_decode($_GET['vSeen']));

if($_GET['r']==="true") {
	$sql = "SELECT * FROM videos ORDER BY RAND()";

}
else {
	$sql = "SELECT * FROM videos ORDER BY id DESC";
}
$result = query($sql);


//nb de videos
$nbvideos = 1;
if(isset($_GET['nb']) && $_GET['nb'] != '' && $_GET['nb'] != 0 && intval($_GET['nb']) < 10)
{
	$nbvideos = intval($_GET['nb']);
}
$arrVideos = selectVideos($result['tmp'], $nbvideos, $vSeen);
print_r(json_encode($arrVideos));

function selectVideos($arrVideos, $nbVideos, $vSeen) {
	
	$arrOutput = array();
	for ($n=0; $n < count($arrVideos); $n++) { 
			//aqui filtra  se já foi visto pelo user e filtar só para utub
		if(!checkIfvSeen($arrVideos[$n]['url'], $vSeen) && strpos($arrVideos[$n]['url'], "youtube.com")) {
			array_push($arrOutput, $arrVideos[$n]);
		}
		if(count($arrOutput) == $nbVideos){
			break;
		}
	}
	return $arrOutput;
}

function checkIfvSeen($url, $arrVSeen) {

	$output = false;
	for ($i=0; $i < count($arrVSeen); $i++) { 
		if($arrVSeen[$i] != "") {
			if(strpos($url, $arrVSeen[$i]) != FALSE) {
				$output = true;
			}
		}
	}
	return $output;
}

//

?>