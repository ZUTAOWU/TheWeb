<!DOCTYPE html>
<html>
	<head>
		<?php include 'head.inc';?>
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
			// add core functions
			require('core.php'); 

			// if logout, then go to index.php
			if(array_key_exists('logout', $_GET) && $_GET['logout'] == 'true'){
				session_destroy();
				header("Location: index.php");
			}

			//select data from database and each page show 3 items
			$page_display_num = 3;
			$current_page_num = parse_pagenum();
			//$rows = sql_query_page("select * from Items I left join (select cast(AVG(RATE) as integer) as RATE, ITEMID from Reviews group by ITEMID) R  on  I.ID = R.ITEMID",$current_page_num, $page_display_num); 
			$rows = sql_query_page("select * from Items I left join (select AVG(RATE) as RATE, ITEMID from Reviews group by ITEMID) R  on  I.ID = R.ITEMID",$current_page_num, $page_display_num); 
			$counts = sql_query_table_count("Items");
			$total_page_num = get_total_pagenum($page_display_num, $counts);
			//alert($counts);
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
					<?php


						foreach($rows as $row) {
					?>
					<div class="content">
						<div class="content-head">
							<a href="./content.php?<?php echo $row['ID']?>" ><?php echo $row['NAME'] ?></a>
						</div>
						<div class="content-main" itemscope itemtype="http://schema.org/Place">
							<span itemprop="name"><?php echo $row['NAME'] ?></span>
							<br/><br/>
							<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
							    <span itemprop="streetAddress"><?php echo $row['ADDRESS'] ?></span>
							    <span itemprop="addressLocality"><?php echo $row['SUBURB'] ?></span>,
							    <span itemprop="addressRegion">QueensLand</span>
							 </div>
							 <br/>
							 <div itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
							    Latitude: <?php echo $row['Latitude'] ?><br/>
							    Longitude: <?php echo $row['Longitude'] ?>
							    <meta itemprop="latitude" content="<?php echo $row['Latitude'] ?>" />
							    <meta itemprop="longitude" content="<?php echo $row['Longitude'] ?>" />
							  </div>
						</div>
						<div class="content-foot">
							<span class="foot-like">
								<?php 
									if($row['RATE'])
										echo $row['RATE'];
									else 
										echo 'No ';
								?> 
								- <a class="like-button" href="#" >Rate </a></span>  
							<!-- <span class="foot-dislike">10 - <a class="dislike-button" href="#">Dislike </a></span> -->
						</div>
					</div>

					<?php 
							
						} 
					?>	
					
					<div class="page"> 
						<?php
							// show page selection
							if(count($rows) <= 0) {
								echo "No Items";
							} else {
								echo get_page_html($current_page_num, $total_page_num);
							}
						?>
					</div>
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
			<?php include 'footer.inc';?>
		</div>
		<script>
		//create the maps on web page
		var map = googlemap_createMap("map-canvas");
		<?php 
			foreach($rows as $row) {
				echo "googlemap_setMaker({$row['Latitude']}, {$row['Longitude']}, map, '{$row['ID']}');";
			}
		?>
		googlemap_createMap("map-canvas2");
		</script>
	</body>
</html> 