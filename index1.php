<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
		<!-- Meta data for mobile device display -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
		<link href="./style/style.css" rel="stylesheet" type="text/css"/>
		<!-- smallDevice.css for small screen device -->
		<link href="./style/smallDevice.css" rel="stylesheet" type="text/css" media="only screen and (max-width: 900px), only screen and (max-device-width: 480px)" />
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>
		<script  type="text/javascript" src="./js/main.js" ></script>
		<title>Brisbane Life</title>
		<!-- Meta data for Open Graph protocol -->
		<meta property="og:title" content="Brisbane Life" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="http://54.206.43.109/~n8975698/a1/index.html" />
		<meta property="og:image" content="http://54.206.43.109/~n8975698/a1/image/1.png" />
		<!-- Meta data for twitter cards -->
		<meta name="twitter:card" content="summary"/>
		<meta name="twitter:site" content="@ZUTAOWU"/>
		<meta name="twitter:creator" content="@ZUTAOWU"/>
		<meta name="twitter:image" content="http://54.206.43.109/~n8975698/a1/image/1.png"/>
		<meta name="twitter:description" content="This web site can help you find a wifi hotspot easily"/>
		<meta name="twitter:title" content="Brisbane Life -- WIFI"/>
		<meta name="twitter:url" content="http://54.206.43.109/~n8975698/a1/"/>
		<!-- <meta name="twitter:domain" content="54.206.43.109"/> -->
		<!-- Just for IE change the header back ground to green
			because IE do not support linear-gradient(30deg,#2276ad,#6ec654); 
		-->
		<!--[if IE]>
		<style type="text/css">
		  .header {
			background-color:#00AC00;
		  }
		</style>
		<![endif]-->
		<?php
			require('core.php'); 
			//$rows = sql_query("SELECT * FROM Items"); 
			$rows = sql_query_page("SELECT * FROM Items",1, 3); 
		?>
	</head>
	<body>
		<div class="whole-page">
			<?php include 'menu.inc';?>
			<div class="header"> 
				<div class="head">
				<span class="Header-B">B</span>risbane <span class="Header-L">L</span>ife
				</div>
				<div class="header-description"> We can help you find WIFI Hotspot </div>
			</div>	

			<div class="whole-content">
				<!--left box use to show the place information-->
				<!--include 3 hard-coded information -->
				<div class="left-box">
					<div class="content">
						<div class="content-head">
							<a href="./content.html" >WIFI in Chermside</a>
						</div>
						<div class="content-main" itemscope itemtype="http://schema.org/Place">
							<span itemprop="name">Banyo Library Wifi</span>
							<br/><br/>
							<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
							    <span itemprop="streetAddress">Delaware St</span>
							    <span itemprop="addressLocality">Chermside</span>,
							    <span itemprop="addressRegion">QLD</span>
							 </div>
							 <br/>
							 <div itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
							    Latitude: 40 deg 44 min 54.36 sec N <br/>
							    Longitude: 73 deg 59 min 8.5 dec W
							    <meta itemprop="latitude" content="40.75" />
							    <meta itemprop="longitude" content="73.98" />
							  </div>
						</div>
						<div class="content-foot">
							<span class="foot-like">10 - <a class="like-button" href="#" >Like </a></span>  
							<span class="foot-dislike">10 - <a class="dislike-button" href="#">Dislike </a></span>
						</div>
					</div>

					<div class="content">
						<div class="content-head">
							<a href="./content.html" >Ashgrove Library Wifi</a>
						</div>
						<div class="content-main" itemscope itemtype="http://schema.org/Place">
							<span itemprop="name">Ashgrove Library Wifi</span>
							<br/><br/>
							<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
							    <span itemprop="streetAddress">Ashgrove</span>
							    <span itemprop="addressLocality">Brisbane</span>,
							    <span itemprop="addressRegion">QLD</span>
							 </div>
							 <br/>
							 <div itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
							    Latitude: 40 deg 44 min 54.36 sec N <br/>
							    Longitude: 73 deg 59 min 8.5 dec W
							    <meta itemprop="latitude" content="40.75" />
							    <meta itemprop="longitude" content="73.98" />
							  </div>
						</div>
						<div class="content-foot">
							<span class="foot-like">10 - <a class="like-button" href="#" >Like </a></span>  
							<span class="foot-dislike">10 - <a class="dislike-button" href="#">Dislike </a></span>
						</div>
					</div>
					<div class="content"> 
						<div class="content-head">
							<a href="./content.html" >Banyo Library Wifi</a>
						</div>
						<div class="content-main" itemscope itemtype="http://schema.org/Place">
							<span itemprop="name">Banyo Library Wifi</span>
							<br/><br/>
							<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
							    <span itemprop="streetAddress">284 St Vincents Road</span>
							    <span itemprop="addressLocality">Banyo 4014</span>,
							    <span itemprop="addressRegion">QLD</span>
							 </div>
							 <br/>
							 <div itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
							    Latitude: 40 deg 44 min 54.36 sec N <br/>
							    Longitude: 73 deg 59 min 8.5 dec W

							    <meta itemprop="latitude" content="40.75" />
							    <meta itemprop="longitude" content="73.98" />
							  </div>
						</div>
						<div class="content-foot">
							<span class="foot-like">10 - <a class="like-button" href="#" >Like </a></span>  
							<span class="foot-dislike">10 - <a class="dislike-button" href="#">Dislike </a></span>
						</div>
					</div>
					<div class="page-num">  </div>
				</div>
				<!--right box use to show the maps-->
				<div class="right-box">
					<div class="map" id="map-canvas">
						<!-- map -->
					</div>

					<div class="map" id="map-canvas2">
						<!-- map --> 
					</div>
				</div>
			</div>
			<div class="footer" id="footer">Copyright 2014</div>
		</div>
		<script>
		// create the maps on web page
		// just some hard codes, we will finish the really function of map on assignment2
		var map = googlemap_createMap("map-canvas");
		googlemap_setMaker(-27.40, 153.00, map);
		googlemap_setMaker(-27.38, 153.05, map);
		googlemap_setMaker(-27.43, 153.08, map);
		googlemap_createMap("map-canvas2");
		</script>
	</body>
		
</html> 