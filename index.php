<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Tá uma merda.</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="shortcut icon" href="favicon.ico"/>

        <!-- PLACE CSS HERE -->
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/addthis.css">
        <link href="http://fonts.googleapis.com/css?family=Finger Paint&subset=latin" rel="stylesheet" type="text/css">
        <!-- PLACE CSS HERE -->

        <!-- PLACE SCRIPTS HERE -->
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=undefined"></script>
        <script src="js/youtubeAPI.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <!-- PLACE SCRIPTS HERE -->
    </head>
    <body>
        
		<!--[if lt IE 7]>
		<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
		<![endif]-->

		<!-- HEADER -->
		<div id="header">
			<img src="img/logo.png" width="60" height="75">   
			<h1>Tá uma merda!</h1>
		</div>
		<!-- HEADER -->


		<!-- CONTENT -->

		<!-- INFO -->
		<div id="info" style="height:25px;width:960px;color:gray;padding-bottom: 15px;">
			<div id="counter" style="float:left;padding-right:15px;"><label></label><label id="vCounter">0  </label></div>
			<div id="category" style="float:left;padding-right:15px;"><label style="text-decoration: underline;">Category</label>: <label id="vCategory"></label>  </div>
			<div id="title" style="float:left;padding-right:15px;"><label style="text-decoration: underline;">Title</label>: <label id="vTitle"></label></div>
			<div id="actions" style="width: 310px; float: right; position: absolute;left: 880px;">
				<img id="img_stickman" alt="tá uma merda" src="img/stickman-gif-24.gif" title="tá uma merda" style="float: left;">
				<!-- AddThis Button BEGIN -->
				<div class="addthis_toolbox addthis_default_style addthis_16x16_style" style="margin-top: 5px;">
					<a class="addthis_button_facebook"></a>
					<a class="addthis_button_twitter"></a>
					<a class="addthis_button_pinterest_share"></a>
					<a class="addthis_button_google_plusone_share"></a>
				</div>
				<!-- AddThis Button END -->
			</div>
		</div>
		<!-- INFO -->


		<!-- PLAYER -->
		<div id="player" style="height: 540px;width: 960px;margin: auto;">
			<div id="player0" class="player"></div>
		</div>
		<!-- PLAYER -->

		<!--RIGHT SIDE-->
		<div id="fbshare" style="height: 540px;width: 50px; position:absolute; top: 140px; right: 200px; display:none;">
			<a href="javascript:shareVideoFB();" style="border:0px;">
				POSTA
			</a>
		</div>
		<script type="text/javascript">
			function shareVideoFB() {
				// var shareURL = "http://taumamerda.boxhost.me/?v=UQzktaWylZI";
				// var sharer = "https://www.facebook.com/sharer/sharer.php?s=100&p[title]=BLA&u="+shareURL;
				// window.open(sharer, 'sharer', 'width=626,height=436');
			}
		</script>
		<!--RIGHT SIDE-->

		<!-- CONTENT -->

		<!-- FOOTER -->
		<div id="footer" style="height:25px;width:960px;color:gray;margin: auto;">
            <div id="chkBoxs" style="float: left;">
            	<div class="roundedOne">
					<input type="checkbox" value="1" id="chkDate" name="check" CHECKED/>
					<label for="chkDate"><h1 style="margin: -15px 0px 0px; padding-left: 35px;">Date</h1></label>
				</div>
				<div class="roundedOne" style="bottom: 48px; left: 150px;">
					<input type="checkbox" value="1" id="chkRandom" name="check" />
					<label for="chkRandom"><h1 style="margin: -15px 0px 0px; padding-left: 35px;">Random</h1></label>
				</div>
            </div>
            <div id="next" style="float: right;">
            	<a href="javascript:clearIframes();" style="border:0px;">
					<h1 style="margin:0px;">Next</h1>
				</a>
            </div>
		</div>
		<!-- FOOTER -->


		<!-- Google Analytics-->
        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-41133369-1']);
            _gaq.push(['_trackPageview']);

            (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
        </script>
        <!-- Google Analytics-->
    </body>
</html>
