<!DOCTYPE html>
<html>
	<head> 
		<!-- Meta data for mobile device display -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
		<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
		<link href="./style/style.css" rel="stylesheet" type="text/css"/>
		<!-- smallDevice.css for small screen device -->
		<link href="./style/smallDevice.css" rel="stylesheet" type="text/css" media="only screen and (max-width: 900px), only screen and (max-device-width: 480px)" />
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>
		<script  type="text/javascript" src="./js/main.js" ></script>
		<title>Search</title>
		<?php
			require('core.php'); 
			$page_display_num = 3;
			$select_sql = "SELECT * FROM Items I ";
			$search_name="";
			$search_rate="";
			$search_local="";

			if(array_key_exists('search-name', $_GET)){
				global $search_name; 
				$search_name = $_GET['search-name'];
				$select_sql = $select_sql . " where (NAME like '%$search_name%' or ADDRESS like '%$search_name%' or SUBURB like '%$search_name%') ";
			}

			if(array_key_exists('searchLocal', $_GET)){
				//1 Km = approximately 0.009 degrees
				global $search_local;
				$search_local = $_GET['searchLocal'];
				//alert('$searchLocal');
				//$select_sql = "SELECT * FROM Items where Latitude < ";
				if(array_key_exists('lati', $_GET) and array_key_exists('logi', $_GET)){
					$lati = $_GET['lati'];
					$logi = $_GET['logi'];
					$select_sql = $select_sql . " and  Latitude < " . ($lati + 0.09) . " and Latitude > " . ($lati - 0.09) .  " and  Longitude < " . ($logi + 0.09) . " and Longitude > " . ($logi - 0.09);
					// echo $select_sql;
				}

			}

			if(array_key_exists('search-rate', $_GET)){
				global $search_rate ;
				$search_rate = $_GET['search-rate'];
				if($search_rate <=5 && $search_rate >= 1) {
					//example: select * from Items I where (select avg(RATE) as rateAVG from Reviews R where I.ID = R.ITEMID ) =5;
					$select_sql = $select_sql . " and ( select avg(RATE) as rateAVG from Reviews R where I.ID = R.ITEMID ) = $search_rate";
				}
			}

			$current_page_num = parse_pagenum();
			$counts = sql_query_count($select_sql);
			$rows = sql_query_page($select_sql, $current_page_num, $page_display_num);
			$total_page_num = get_total_pagenum($page_display_num, $counts);
		?>
	</head>
	
	<body>
		<div class="whole-page">
				<?php include 'menu.inc';?>
				<div class="whole-content">

				<div class="search-main">
					<?php //echo $select_sql ;?>
					<form id="search-form" action="search.php" method="get">
					<div class="search-box">
						<span> Search: <input class="search-input-box" type="text" name="search-name" />
						</span>
						<span>
						Rate: <select class="search-select-box" name="search-rate" value='5'>
								  <option value="all">all</option>
								  <option value="5">5</option>
								  <option value="4">4</option>
								  <option value="3">3</option>
								  <option value="2">2</option>
								  <option value="1">1</option>
							  </select> 
						</span>
						<br/>
						<br/>
						<span>
						<input id = "search-local" type="checkbox" name="search_local" value="0" /> search your location: 

						</span>
						<br/>
						<div class="search-button">
							<span class="button search-button" onclick="search_form_submit();"> search </span>
							<!-- <span class="button search-button" onclick="document.getElementById('search-form').submit();"> search </span> -->
						</div>



						<!-- <div class="search-button">
							<span class="button search-your-location" onclick="searchCurrentPosition()" > search your location </span>
						</div> -->
						<div class="searching-text" >
							Notice: if you want to search your location, please turn on your location service!						
						</div>

					</div>
					</form>
					<div class="content-map" id="search-map-canvas"> </div>
				</div>
				<div class="search-result">
					
					<?php 
						//while($row = mysqli_fetch_array($result)) {
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
							<span class="foot-like">10 - <a class="like-button" href="#" >Like </a></span>  
							<span class="foot-dislike">10 - <a class="dislike-button" href="#">Dislike </a></span>
						</div>
					</div>

					<?php 
							
						} 
					?>	
					<div class="page"> 
						<?php
							echo get_page_html($current_page_num, $total_page_num);
						?>
					</div>
					</div>
				</div>
				</div>
			<div class="footer" id="footer">Copyright 2014</div>
		</div>
		<script type="text/javascript">

		setSearchForm("<?php echo $search_name ?>","<?php echo $search_rate ?>","<?php echo $search_local ?>");
		// create the maps on web page
		// just some hard codes, we will finish the really function of map on assignment2
		var map = googlemap_createMap("search-map-canvas");

		<?php
			if(array_key_exists('lati', $_GET) and array_key_exists('logi', $_GET)){
				$lati = $_GET['lati'];
				$logi = $_GET['logi'];
				echo " googlemap_setMakerAndArea($lati, $logi, map, 10000)";
			}
		?>


		<?php 
			foreach($rows as $row) {
				echo "googlemap_setMaker({$row['Latitude']}, {$row['Longitude']}, map);";
			}
		?>

		</script>
	</body>

	
</html>