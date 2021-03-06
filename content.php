<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include 'head.inc';?>
		
		<!-- Meta data for Open Graph protocol -->
		<meta property="og:title" content="Ashgrove Library Wifi" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="http://54.206.43.109/~n8975698/a1/content.html" />
		<meta property="og:image" content="http://54.206.43.109/~n8975698/a1/image/1.png" />
		<meta property="og:description" content="Ashgrove Library Wifi Latitude: 40 deg 44 min 54.36 sec N -- Longitude: 73 deg 59 min 8.5 dec W"/>
		
		<!-- Meta data for twitter cards -->
		<meta name="twitter:card" content="summary"/>
		<meta name="twitter:site" content="@ZUTAOWU"/>
		<meta name="twitter:creator" content="@ZUTAOWU"/>
		<meta name="twitter:image" content="http://54.206.43.109/~n8975698/a1/image/1.png"/>
		<meta name="twitter:description" content="Ashgrove Library Wifi Latitude: 40 deg 44 min 54.36 sec N -- Longitude: 73 deg 59 min 8.5 dec W"/>
		<meta name="twitter:title" content="Ashgrove Library Wifi"/>
		<meta name="twitter:url" content="http://54.206.43.109/~n8975698/a1/content.html"/>
		<!-- <meta name="twitter:domain" content="54.206.43.109"/> -->
		<title>Content</title>
		<?php
			require('core.php'); 

			//if has summit comments request, then handle submission
			$url = $_SERVER['REQUEST_URI'];
			$parsedURL = parse_url($url,PHP_URL_QUERY);
			// submit comment
			$comment = array_key_exists('comment', $_POST) ? $_POST['comment'] : "";
			$rating = array_key_exists('rating', $_POST) ? $_POST['rating'] : "";
			$submitCommit = array_key_exists('submit-commit', $_POST) ? $_POST['submit-commit'] : "";
			if($submitCommit == 1) {
				// insert review, or comments
				if(insert_comment($comment, $rating, $_SESSION['username'], $parsedURL)) {
					header("Location: {$_SERVER["REQUEST_URI"]}");
				}else {
					alert("add comment fail!");
				}
			}

			if($parsedURL=="") {
				//if url not include Item ID, then go to index page
				header("Location: index.php");
			} else {
				// search Item by ID, then show the items details
				$rows = sql_query("SELECT * FROM Items I where I.ID = '$parsedURL' ");
				$row = $rows[0];
				$rows_review = sql_query("SELECT * FROM Reviews R, Members M where R.ITEMID = '$parsedURL' and R.USERID = M.ID order by R.POSTDATE desc");
			}
			
		?>
	</head>
	<body>

		<div class="whole-page">
			<?php include 'menu.inc';?>


			<div class="content-main-content"> 
				<div class="content-details"> 
						<div itemscope itemtype="http://schema.org/Place">
							<span itemprop="name"><?php echo $row['NAME']; ?></span>
							<br/><br/>
							<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
							    <span itemprop="streetAddress"><?php echo $row['ADDRESS']; ?></span>
							    <span itemprop="addressLocality"><?php echo $row['SUBURB']; ?></span>,
							    <span itemprop="addressRegion">QueensLand</span>
							 </div>
							 <br/>
							<div itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
								Latitude: <?php echo $row['Latitude'] ?> --
								Longitude: <?php echo $row['Longitude'] ?>
								<meta itemprop="latitude" content="40.75" />
								<meta itemprop="longitude" content="73.98" />
							</div>

						</div>
				</div>
				<div class="content-map" id="map-canvas"> </div>
				<?php
				if(!empty($_SESSION['username']) ) { 
				?>
				<div class="content-review">
					<form id='content-comment-form' method='post' action='<?php echo $_SERVER['REQUEST_URI'];?>'>
					Comment:
					</br>
					<textarea name='comment' rows="4" cols="50"></textarea>
					</br>
					</br>
					Rate: 
					<input type="radio" name="rating" value="1">1 &nbsp;
					<input type="radio" name="rating" value="2">2 &nbsp;
					<input type="radio" name="rating" value="3">3 &nbsp;
					<input type="radio" name="rating" value="4">4 &nbsp;
					<input type="radio" name="rating" value="5" checked="true">5
					</br>
					</br>
					<input name='submit-commit' value='1' style='display:none;'/>
					<span class="button" onclick='document.getElementById("content-comment-form").submit();'> submit </span>
				</div>
				<?php } ?>
				<?php 
						foreach($rows_review as $row_review) {
				?>

				<div class="comment-content">
					<div class="content" itemscope itemtype="http://schema.org/Review"> 
						<div class="content-head">
							<span itemprop="author"><?php echo $row_review['USERNAME']?></span>
						</div>
						<div class="content-main" >
							<span itemprop="reviewBody"><?php echo $row_review['CONTENT']?></span>
						</div>
						<div class="content-foot">
							<meta itemprop="datePublished" content="2014-06-15"> date: <?php echo $row_review['POSTDATE']?>
							<span class="comment-like" itemprop="reviewRating">Rate: <?php echo $row_review['RATE']?></span>
						</div>
					</div>
				</div>
				<?php } ?>


			</div>
			<?php include 'footer.inc';?>

		</div>
		<script type="text/javascript">
		
		// create the maps on web page
		// just some hard codes, we will finish the really function of map on assignment2
		
		var lat = <?php echo $row['Latitude']; ?>;
		var lon = <?php echo $row['Longitude']; ?>;
		var map = googlemap_createMapByPosition("map-canvas",lat,lon);
		googlemap_setMaker(lat , lon , map);
		</script>

	</body>	
</html>