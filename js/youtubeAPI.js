	//var
	var arrVSeen = new Array();

	// 2. This code loads the IFrame Player API code asynchronously.
	var tag = document.createElement('script');

	tag.src = "https://www.youtube.com/iframe_api";
	var firstScriptTag = document.getElementsByTagName('script')[0];
	firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

	function onYouTubeIframeAPIReady() {

		var parts = window.location.search.substr(1).split("&");
		if(parts.length > 0 && parts[0] != ""){
			addVideo(getVideoRequested(parts), "player0")
		}else {
			getEntry(1);
		}
	}

	function youtubeFeedCall(videoTag){

		$.getJSON('https://gdata.youtube.com/feeds/api/videos/'+videoTag+'?v=2&alt=json', function(data) {
			
			var vCategory = data["entry"]["category"][1].label+" & "+data["entry"]["category"][1].term;
			var vTitle = data["entry"]["title"]["$t"];
			var vThumb = data["entry"]["media$group"]["media$thumbnail"][0]["url"];

			document.getElementById('vCategory').innerHTML = String(vCategory);
			document.getElementById('vTitle').innerHTML = String(vTitle);
		});

		return;
	}

	//Adiciona video
	function addVideo(videoTag, selectedDiv) {
		var player = new YT.Player(selectedDiv, {
			height: '540',
			width: '960',
			videoId: videoTag,
			events: {
				'onReady': startPlayVideo,
				'onStateChange': onPlayerStateChange
			}
		});
		youtubeFeedCall(videoTag);
		addVSeen(videoTag);
	}

	//play video
	function startPlayVideo(event) {
		event.target.playVideo();

		setTimeout(function(){$("#fbshare").animate({"right": "-=20px"}, "slow").toggle();},4000);
	}

	// 4. The API will call this function when the video player is ready.
	function onPlayerReady(event) {
		startPlayVideo(event);
	}

	// 5. The API calls this function when the player's state changes.
	function onPlayerStateChange(event) {
	   if (event.data === 0) {
	   		clearIframes();
		}
	}

	//adiciona uma div com id = divId
	function addDivPlayer(divId) {

		var div = document.createElement("div");
		div.id = divId;
		div.class = "player";

		// document.body.appendChild(div);
		var theDiv = document.getElementById("player");
		theDiv.appendChild(div);

		return;
	}

	//limpa todos os iframes do document e adiciona uma div id=player0
	function clearIframes() {
		if (!parent) return;
		if (!parent.frames) return;
		for (var i=0; i < parent.frames.length; i++)
		{
			var iframe = parent.document.getElementsByTagName('iframe')[i];
			iframe.parentNode.removeChild(iframe);
			addDivPlayer("player0");
		}
		getEntry(1);
	}

	//retorn a tag do video
	function getVideoTag(url, urlParent) {
		if (urlParent == 'youtube') {
			var videoTag = url.split('http:\/\/www.youtube.com\/embed\/');
			return videoTag[1];
		}
	}

	//cria os diversos iframes
	function createVideoMatrix(arrVideos) {

		for (var i = 0; i < arrVideos.length; i++) {
			var selectedDiv = "player" + i;
			addVideo(getVideoTag(arrVideos[i]['url'], 'youtube'), selectedDiv);
		}
	}

	//adiciona videoTag ao array global
	function addVSeen(videoTag) {
		arrVSeen.push(videoTag);
		//update counter
		var counter = parseInt(document.getElementById('vCounter').innerHTML);
		counter += 1;
		document.getElementById('vCounter').innerHTML = String(counter);
	}

	//retorna string com os ids dos videos ja vistos
	function getVSeen() {
		var strVideosSeen = "";
		for (var i = 0; i < arrVSeen.length ; i++) {
			strVideosSeen += arrVSeen[i];
			if(i != arrVSeen.length-1){strVideosSeen += ", ";}
		}
		//window.btoa string to base64encode
		return window.btoa(strVideosSeen);
	}

	//buscar videos ao servidor | nbVideos = nb de videos a retorna 1 min 10 max
	function getEntry(nbVideos) {

		//Aqui adicionar codigo que contem o id das entradas ja vistas
		var strVideosSeen = getVSeen();
		var valRandom = document.getElementById('chkRandom').checked;
		var url = "http://taumamerda.boxhost.me/services/getEntry.php?r="+valRandom+"&nb="+nbVideos+"&vSeen="+strVideosSeen;

		var xhReq = new XMLHttpRequest();
		xhReq.open("GET", url, true);
		xhReq.onreadystatechange = function() {
			if (xhReq.readyState == 4 && xhReq.status == 200) {
				createVideoMatrix(JSON.parse(xhReq.responseText));
			}
		};
		xhReq.send(null);
	}

	function getVideoRequested (parts) {
		var $_GET = {};
		for (var i = 0; i < parts.length; i++) {
		    var temp = parts[i].split("=");
		    $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
		}

		return $_GET['v'];
	}