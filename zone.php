<?php

$currentPage = 'zone';

session_start();

$zone_id = $_GET['id'];

try {
	include_once ("classes/Zone.class.php");

	$zone = new Zone();
	$zone_name = $zone -> getZoneById($zone_id);
	$temp = $zone_name -> fetch_assoc();

	$zone_color = $temp['zone_color'];
	$zone_feed = $temp['zone_feed'];

	$mode = $_GET['variable'];

} catch (Exception $e) {

}
?><!DOCTYPE html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
		<link rel="apple-touch-icon-precomposed" href="../images/icon.png"/>
		<meta name="description" content="" />
		<meta name="author" content="Sonny Willems" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
		<link id= "css" rel="stylesheet" type="text/css" href="css/style2.css" />
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,700' rel='stylesheet' type='text/css'>
		<title>Zone</title>
	</head>
	<body>
		<div class="container">

			<!--NAVIGATION HEADER-->

			<header>
				<div class="header">
					&nbsp;
				</div>
				
				<div class="settings" ontouchstart="window.location.href='zones.php'" id="zones_btn">
				<img src="images/zones.png" class="logo_zones" ontouchstart="window.location.href='zones.php'" />
					</div>
				<div class="settings" ontouchstart="window.location.href='favorites.php'" id="favorites">
					<img src="images/favorites_icon.png"
					class="icon" id="icon_favorites" ontouchstart="window.location.href='favorites.php'"/>
				</div>
				<img src="images/line.png" class="line"/>
				<img src="images/search_icon.png" class="icon" id="icon_search" ontouchstart="#"/>
				<div class="settings" ontouchstart="#">

				</div>
				<div class="title" id="zone_title">
					<p id="zone_t"><?=$temp['zone_name'] ?></p>
				</div>
			</header>
			
			<!--END NAVIGATION HEADER-->

			<!--OPEN ARTICLE-->
			
			<img src="images/close.png" class="close_img" ontouchstart="closeArticle(event);"/>
			<div class="close" ontouchstart="closeArticle(event);"></div>
				<div class='title_bg_open'>
															
			<?php
			parserSide2("http://news.yahoo.com/rss/gaming");
			function parserSide2($feedURL) {
				$rss = simplexml_load_file($feedURL);

				$i = 2;
				foreach ($rss->channel->item as $feedItem) {
					$i++;
					echo "<h1 class='article_title_open' id='article_title' ontouchstart=\"openArticle(event)\">" . $feedItem -> title . "</h1>";
					echo "<div class='reading_text_open'>" . $feedItem -> description . "</div>";

					if ($i >= 1)
						break;
				}
			}
		?>						
				</div>
			<div class='content_open'>
									<?php
									parserSide3("http://news.yahoo.com/rss/gaming");
									function parserSide3($feedURL) {
										$rss = simplexml_load_file($feedURL);

										$i = 2;
										foreach ($rss->channel->item as $feedItem) {
											$i++;
											echo "<p class='reading_footer_open'>" . $feedItem -> source . " | " . $feedItem -> pubDate . "</p>";
											echo "<div class='reading_text_open'>" . $feedItem -> description . "</div>";
											echo "<img class='facebook_open' src='images/facebook-grey.png' ontouchstart=\"window.location.href='" . $temp['zone_link'] . "'\" />";
											echo "<div class='facebook_bg_open' ontouchstart=\"window.location.href='" . $temp['zone_link'] . "'\"></div>";
											echo "<img class='twitter_open' src='images/twitter-grey.png' ontouchstart=\"window.location.href='" . $temp['zone_link'] . "'\" />";
											echo "<div class='twitter_bg_open' ontouchstart=\"window.location.href='" . $temp['zone_link'] . "'\"></div>";
											if ($i >= 1)
												break;
										}
									}
		?>					
			</div>
			<div class="dark_layer"></div>
			
			<!--END OPEN ARTICLE-->
					
			<!--INTERACTION MODE-->

		<div class="main_btn"  id="main_btn" ontouchstart="toggleMenu(event);"></div>
		<img src="images/scanning.png" class="scanning" id="main_btn3" ontouchstart="toggleMenu(event);"/>
		<div id="interaction_modes">
			<div class="reading_btn" id="reading_btn" ontouchstart="switchToReadingMode(event);">
				<img src="images/reading.png" class="reading" id="reading_btn" ontouchstart="switchToReadingMode(event);"/>
			</div>

			<div class="scanning_btn" id="scanning_btn" ontouchstart="switchToScanningMode(event);">
				<img src="images/scanning.png" class="scanning2" id="scanning_btn" ontouchstart="switchToScanningMode(event);"/>
			</div>

			<div class="glancing_btn" id="glancing_btn" ontouchstart="switchToGlancingMode(event);">
				<img src="images/logo_small.png" class="glancing" id="glancing_btn" ontouchstart="switchToGlancingMode(event);"/>
			</div>
		</div>
				<div class="lock_btn"  id="lock_btn" ontouchstart="toggleLockGlancing(event);"></div>
				<img src="images/block_icon.png" class="lock" id="lock_btn2" ontouchstart="toggleLockGlancing(event);"/>
				
				<div class="arrow_r"  id="arrow_r" ontouchstart="#"></div>
				<img src="images/arrow_r.png" class="arrow" id="arrow_r2" ontouchstart="#"/> <!-- countDown(event); -->
				
				<div class="arrow_r"  id="arrow_l" ontouchstart="#"></div>
				<img src="images/arrow_l.png" class="arrow" id="arrow_l2" ontouchstart="#"/> <!-- countUp(event); -->

	</div>
	<!--END INTERACTION MODE-->

			<!--ZONE-->
				
	<?php
	parserSide("http://news.yahoo.com/rss/gaming");
	function parserSide($feedURL) {
		$rss = simplexml_load_file($feedURL);

		echo "<div id='all_articles'>";
		$i = 0;
		foreach ($rss->channel->item as $feedItem) {
			$i++;
			echo "<div class='articles' id='article' ontouchend=\"openArticle(event)\" style=\"background: url('http://rack.1.mshcdn.com/media/ZgkyMDEzLzA1LzMwLzNmL1dpbmRvd3M4ZXZlLmMxOTY5LmpwZwpwCXRodW1iCTk1MHg1MzQjCmUJanBn/917731f5/c02/Windows-8-event.jpg') no-repeat;\">\n";
			echo "<img class='image_scanning' src='http://rack.1.mshcdn.com/media/ZgkyMDEzLzA1LzMwLzNmL1dpbmRvd3M4ZXZlLmMxOTY5LmpwZwpwCXRodW1iCTk1MHg1MzQjCmUJanBn/917731f5/c02/Windows-8-event.jpg' />";
			echo "<h1 class='article_title' id='article_title' ontouchend=\"openArticle(event)\">" . $feedItem -> title . "</h1>";
			echo "<div class='title_bg'></div>";
			echo "<div class='article_side'></div>";
			echo "<div class='content_reading'>";
			echo "<div class='reading_text'>" . $feedItem -> description . "</div>";
			echo "<img class='image_reading' src='http://rack.1.mshcdn.com/media/ZgkyMDEzLzA1LzMwLzNmL1dpbmRvd3M4ZXZlLmMxOTY5LmpwZwpwCXRodW1iCTk1MHg1MzQjCmUJanBn/917731f5/c02/Windows-8-event.jpg' />";
			echo "<p class='reading_footer'>" . $feedItem -> source . " | " . $feedItem -> pubDate . "</p>";
			echo "<img class='facebook' src='images/facebook-grey.png' ontouchstart=\"window.location.href='" . $temp['zone_link'] . "'\" />";
			echo "<div class='facebook_bg' ontouchstart=\"window.location.href='" . $temp['zone_link'] . "'\"></div>";
			echo "<img class='twitter' src='images/twitter-grey.png' ontouchstart=\"window.location.href='" . $temp['zone_link'] . "'\" />";
			echo "<div class='twitter_bg' ontouchstart=\"window.location.href='" . $temp['zone_link'] . "'\"></div>";
			echo "</div>";
			echo "</div>";
			if ($i >= 2)
				break;
		}
		echo "</div>";
	}
?>
			<!--END ZONE-->
			
			<!--POSITION INDICATION-->
			
			<div class="position" id="position" ></div>
			
			<!--END POSITION INDICATION-->
	</body>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script type="text/javascript" src="http://labs.skinkers.com/content/touchSwipe/jquery.touchSwipe.min.js"></script>
	<script type="text/javascript">
		var mode;

		$(".articles").swipe({
			swipeUp : function(event, direction, distance, duration, fingerCount) {
				alert('Saved');
			}
		});

		function openArticle(e) {

			if (mode == "reading") {
			} else {

				$('.dark_layer').css({
					"display" : "block"
				});

				$('.title_bg_open').css({
					"display" : "block"
				});

				$('.content_open').css({
					"display" : "block"
				});

				$('.reading_text_open').css({
					"display" : "block"
				});

				$('.facebook_open').css({
					"display" : "block"
				});

				$('.facebook_bg_open').css({
					"display" : "block"
				});

				$('.twitter_open').css({
					"display" : "block"
				});

				$('.twitter_bg_open').css({
					"display" : "block"
				});

				$('.reading_footer_open').css({
					"display" : "block"
				});

				$('.close').css({
					"display" : "block"
				});

				$('.close_img').css({
					"display" : "block"
				});

			}
			var zone_t = document.getElementById("zone_t").innerHTML;

			if (zone_t == "Design") {

				$('.title_bg_open').css({
					"background-color" : "#C6563E"
				});
			} else if (zone_t == "Astronomy") {
				$('.title_bg_open').css({
					"background-color" : "#20BBBB"
				});
			} else if (zone_t == "Business") {
				$('.title_bg_open').css({
					"background-color" : "#87939B"
				});
			} else if (zone_t == "Fashion") {
				$('.title_bg_open').css({
					"background-color" : "#AD69C9"
				});
			} else if (zone_t == "Lifestyle") {
				$('.title_bg_open').css({
					"background-color" : "#E58B41"
				});
			} else if (zone_t == "Film") {
				$('.title_bg_open').css({
					"background-color" : "#20262B"
				});
			} else if (zone_t == "Food") {
				$('.title_bg_open').css({
					"background-color" : "#80658A"
				});
			} else if (zone_t == "Gaming") {
				$('.title_bg_open').css({
					"background-color" : "#309C71"
				});
			} else if (zone_t == "Music") {
				$('.title_bg_open').css({
					"background-color" : "#DDDD3E"
				});
			} else if (zone_t == "Science") {
				$('.title_bg_open').css({
					"background-color" : "#35AABA"
				});
			} else if (zone_t == "Sports") {
				$('.title_bg_open').css({
					"background-color" : "#B56E3E"
				});
			} else if (zone_t == "Technology") {
				$('.title_bg_open').css({
					"background-color" : "#3E92C1"
				});
			}
		}

		function closeArticle(e) {
			$('.dark_layer').css({
				"display" : "none"
			});

			$('.title_bg_open').css({
				"display" : "none"
			});

			$('.content_open').css({
				"display" : "none"
			});

			$('.reading_text_open').css({
				"display" : "none"
			});

			$('.facebook_open').css({
				"display" : "none"
			});

			$('.facebook_bg_open').css({
				"display" : "none"
			});

			$('.twitter_open').css({
				"display" : "none"
			});

			$('.twitter_bg_open').css({
				"display" : "none"
			});

			$('.reading_footer_open').css({
				"display" : "none"
			});

			$('.close').css({
				"display" : "none"
			});

			$('.close_img').css({
				"display" : "none"
			});

		}

		//window.onload = moveArticles;

		var count = document.getElementById('article_title').innerHTML.split(' ').length;

		//COLOR POSITION

		var zone_color =                                                                                                     
<?php echo json_encode($zone_color); ?>
	;

	var zone_t = document.getElementById("zone_t").innerHTML;

	if (zone_t == "Design") {
		$('.position').css({
			"background-color" : "#C6563E"
		});

		$('.article_side').css({
			"background-color" : "#C6563E"
		});

	} else if (zone_t == "Astronomy") {
		$('.position').css({
			"background-color" : "#20BBBB"
		});

		$('.article_side').css({
			"background-color" : "#20BBBB"
		});
	} else if (zone_t == "Business") {
		$('.position').css({
			"background-color" : "#87939B"
		});

		$('.article_side').css({
			"background-color" : "#87939B"
		});
	} else if (zone_t == "Fashion") {
		$('.position').css({
			"background-color" : "#AD69C9"
		});

		$('.article_side').css({
			"background-color" : "#AD69C9"
		});
	} else if (zone_t == "Lifestyle") {
		$('.position').css({
			"background-color" : "#E58B41"
		});

		$('.article_side').css({
			"background-color" : "#E58B41"
		});
	} else if (zone_t == "Film") {
		$('.position').css({
			"background-color" : "#20262B"
		});

		$('.article_side').css({
			"background-color" : "#20262B"
		});
	} else if (zone_t == "Food") {
		$('.position').css({
			"background-color" : "#80658A"
		});

		$('.article_side').css({
			"background-color" : "#80658A"
		});
	} else if (zone_t == "Gaming") {
		$('.position').css({
			"background-color" : "#309C71"
		});

		$('.article_side').css({
			"background-color" : "#309C71"
		});
	} else if (zone_t == "Music") {
		$('.position').css({
			"background-color" : "#DDDD3E"
		});

		$('.article_side').css({
			"background-color" : "#DDDD3E"
		});
	} else if (zone_t == "Science") {
		$('.position').css({
			"background-color" : "#35AABA"
		});
		$('.article_side').css({
			"background-color" : "#35AABA"
		});
	} else if (zone_t == "Sports") {
		$('.position').css({
			"background-color" : "#B56E3E"
		});

		$('.article_side').css({
			"background-color" : "#B56E3E"
		});
	} else if (zone_t == "Technology") {
		$('.position').css({
			"background-color" : "#3E92C1"
		});

		$('.article_side').css({
			"background-color" : "#3E92C1"
		});
	}

	//SIZE OF PHOTOS

	function moveArticles() {

		var x = 0, y = 0, vx = 0, vy = 0, ax = 0, ay = 0;
		var articles = document.getElementById("article");
		var position = document.getElementById("position");

		if (window.DeviceMotionEvent != undefined) {
			window.ondevicemotion = function(e) {
				ax = event.accelerationIncludingGravity.x * 5;
				ay = event.accelerationIncludingGravity.y * 5;
				e.accelerationIncludingGravity.x
				e.accelerationIncludingGravity.y
				if (e.rotationRate) {
					e.rotationRate.alpha
					e.rotationRate.beta
					e.rotationRate.gamma
				}
			}
			setInterval(function() {
				var landscapeOrientation = window.innerWidth / window.innerHeight > 1;
				if (landscapeOrientation) {
					vx = vx + ay;
					vy = vy + ax;
				} else {
					vy = vy - ay;
					vx = vx + ax;
				}
				vx = vx * 0.99;
				vy = vy * 0.99;
				y = parseInt(y + vy / 50);
				x = parseInt(x + vx / 50);
				articles.style.left = x + "px";
				//position.style.left = x + "px";

			}, 25);
		}

	}

	function toggleMenu(e) {

		//Hide or show the interaction menu

		var interaction_modes = document.getElementById("interaction_modes");

		interaction_modes.style.visibility = "visible";

		/*if (interaction_modes.style.visibility == "hidden") {

		 interaction_modes.style.visibility = "visible";

		 } else {
		 interaction_modes.style.visibility = "hidden";

		 }

		 e.preventDefault();
		 return false;*/
	}

	function switchToGlancingMode(e) {

		//Switch button

		document.getElementById("main_btn3").src = "images/logo_small.png";

		//Hide interaction modes

		interaction_modes.style.visibility = "hidden";

		//Change style (without flickering)

		$('.articles').css({
			"width" : "350px",
			"height" : "230px",
			"position" : "relative",
			"float" : "left",
			"margin-left" : "-83px",
			"padding-right" : "10px",
			"margin-top" : "-38px",
			"margin-right" : "5px"
		});

		$('.article_img').css({
			"width" : "350px",
			"height" : "230px",
			"margin-left" : "-83px"
		});

		var count = document.getElementById('article_title').innerHTML.split(' ').length;

		if (count >= 10) {
			$('.article_title').css({
				"width" : "250px",
				"font-size" : "13px",
				"padding-left" : "15px",
				"padding-top" : "240px",
				"z-index" : "50"
			});

			$('.title_bg').css({
				"width" : "270px",
				"height" : "70px",
				"background-color" : "#13292D",
				"opacity" : "0.9",
				"margin-left" : "0px",
				"margin-top" : "-60px"
			});
		} else {

			$('.article_title').css({
				"width" : "250px",
				"font-size" : "13px",
				"padding-left" : "15px",
				"padding-top" : "250px",
				"z-index" : "50"
			});

			$('.title_bg').css({
				"width" : "270px",
				"height" : "70px",
				"background-color" : "#13292D",
				"opacity" : "0.9",
				"margin-left" : "0px",
				"margin-top" : "-57px"
			});

		}

		$('.scanning').css({
			"margin-top" : "295px",
			"width" : "45px",
			"margin-left" : "38px"
		});

		$('.arrow_r').css({
			"display" : "none"
		});

		$('.arrow').css({
			"display" : "none"
		});

		$('.lock_btn').css({
			"display" : "block"
		});

		$('.lock').css({
			"display" : "block"
		});

		$('.image_scanning').css({
			"display" : "none"
		});

		$('.articles').css({
			"backgroundSize" : "270px 185px"
		});

		$('.article_side').css({
			"visibility" : "hidden"
		});

		$('.content_reading').css({
			"visibility" : "hidden",
			"width" : "0px",
			"height" : "0px"
		});

		$('.reading_text').css({
			"visibility" : "hidden",
			"width" : "0px",
			"height" : "0px"

		});

		$('.image_reading').css({
			"visibility" : "hidden",
			"width" : "0px",
			"height" : "0px"

		});

		$('.reading_footer').css({
			"visibility" : "hidden"
		});

		$('.facebook_bg').css({
			"visibility" : "hidden"

		});

		$('.facebook').css({
			"visibility" : "hidden"

		});

		$('.twitter_bg').css({
			"visibility" : "hidden"

		});

		$('.twitter').css({
			"visibility" : "hidden"

		});

		var x = 0, y = 0, vx = 0, vy = 0, ax = 0, ay = 0;
		var articles = document.getElementById("all_articles");
		var position = document.getElementById("position");

		if (window.DeviceMotionEvent != undefined) {
			window.ondevicemotion = function(e) {
				ax = event.accelerationIncludingGravity.x * 5;
				ay = event.accelerationIncludingGravity.y * 5;
				e.accelerationIncludingGravity.x
				e.accelerationIncludingGravity.y
				if (e.rotationRate) {
					e.rotationRate.alpha
					e.rotationRate.beta
					e.rotationRate.gamma
				}
			}
			setInterval(function() {
				var landscapeOrientation = window.innerWidth / window.innerHeight > 1;
				if (landscapeOrientation) {
					vx = vx + ay;
					vy = vy + ax;
				} else {
					vy = vy - ay;
					vx = vx + ax;
				}
				vx = vx * 0.99;
				x = parseInt(x + vx / 5);
				articles.style.left = x + "px";
				//position.style.left = x + "px";

			}, 25);
		}
	}

	function switchToScanningMode(e) {
		
		mode = "scanning";
		//Switch button

		document.getElementById("main_btn3").src = "images/scanning.png";

		//Hide interaction modes

		interaction_modes.style.visibility = "hidden";

		//Change style (without flickering)

		$('.zone').css({
			"width" : "250px",
			"height" : "200px",
			"margin" : "110px 20px 20px 10px",
			"float" : "left"
		});

		$('.articles').css({
			"width" : "570px",
			"height" : "150px",
			"position" : "relative",
			"margin" : "-38px 20px 50px -83px",
			"float" : "left",
			"padding-right" : "10px",
			"backgroundSize" : "100px 180px"

		});

		$('.article_img').css({
			"width" : "350px",
			"height" : "230px",
			"margin-left" : "-83px"

		});

		$('.article_title').css({
			"width" : "340px",
			"font-size" : "22px",
			"padding-left" : "240px",
			"margin-top" : "-110px",
			"position" : "relative",
			"padding-top" : "0px",
			"z-index" : "50"
		});

		$('.title_bg').css({
			"width" : "357px",
			"height" : "150px",
			"background-color" : "#13292D",
			"margin-left" : "220px",
			"margin-top" : "-116px"
		});

		$('.article_side').css({
			"visibility" : "visible",
			"width" : "13px",
			"height" : "150px",
			"position" : "relative",
			"z-index" : "51",
			"margin-top" : "-150px",
			"margin-left" : "567px"
		});

		$('.zone_bg').css({
			"width" : "250px",
			"height" : "60px",
			"margin-top" : "-3px"
		});

		$('.scanning').css({
			"margin-top" : "298px",
			"width" : "45px",
			"margin-left" : "38px"
		});

		$('.zone_title').css({
			"margin" : "10px 0 0 0",
			"padding" : "0 10px 0 40px"

		});

		$('.line_horizontal').css({
			"margin" : "170px 0 0 -250px",
			"width" : "251px"

		});

		$('.zone_image').css({
			"width" : "250px",
			"height" : "170px",
			"visibility" : "visible"

		});

		$('.zone_bg_reading').css({
			"display" : "none"
		});

		$('.zone_image2').css({
			"display" : "none"
		});

		$('.arrow_r').css({
			"display" : "block"
		});

		$('.arrow').css({
			"display" : "block"
		});

		$('.lock_btn').css({
			"display" : "block"
		});

		$('.lock').css({
			"display" : "block",
			"margin-top" : "383px"
		});

		$('#arrow_r2').css({
			"margin-top" : "293px"
		});

		$('#arrow_l2').css({
			"margin-top" : "477px"
		});

		$('.image_scanning').css({
			"display" : "inline",
			"width" : "220px",
			"height" : "150px"
		});

		$('.content_reading').css({
			"visibility" : "hidden",
			"width" : "0px",
			"height" : "0px"
		});

		$('.reading_text').css({
			"visibility" : "hidden",
			"width" : "0px",
			"height" : "0px"

		});

		$('.image_reading').css({
			"visibility" : "hidden",
			"width" : "0px",
			"height" : "0px"

		});

		$('.reading_footer').css({
			"visibility" : "hidden"
		});

		$('.facebook_bg').css({
			"visibility" : "hidden"

		});

		$('.facebook').css({
			"visibility" : "hidden"

		});

		$('.twitter_bg').css({
			"visibility" : "hidden"

		});

		$('.twitter').css({
			"visibility" : "hidden"

		});

		$('header').css({
			"position" : "absolute",
			"z-index" : "0",
			"overflow" : "auto"
		});

		$('.main_btn').css({
			"position" : "absolute",
			"overflow" : "auto"
		});

		$('.scanning').css({
			"position" : "absolute",
			"overflow" : "auto"
		});

		$('#interaction_modes').css({
			"position" : "absolute"
		});

		$('body').css({
			"background" : "url('images/bg.jpg') no-repeat"
		});

	//window.onload = init;
	}
	
/*	
	var articles = null;
	var speed = 0;
	
	function init() {
		articles = document.getElementById("all_articles");
		articles.style.left = '0px';
	}

	function toggleLockGlancing(e) {
		//STOP DE FLOW
		speed = 0;
	}

	function countUp(e) {
		speed++;
		doMove();
	}
	function countDown(e) {
		speed--;
		doMove();
	}
	function doMove() {
		var sp = parseInt(articles.style.left);
		articles.style.left = sp + speed + 'px';
		setTimeout(doMove,20);
	}
*/	
	

	function switchToReadingMode(e) {

		mode = "reading";

		//Switch button

		document.getElementById("main_btn3").src = "images/reading.png";

		//Hide interaction modes

		interaction_modes.style.visibility = "hidden";

		//Change style (without flickering)

		var zone_t = document.getElementById("zone_t").innerHTML;

		if (zone_t == "Design") {

			$('.title_bg').css({
				"background-color" : "#C6563E"
			});
		} else if (zone_t == "Astronomy") {
			$('.title_bg').css({
				"background-color" : "#20BBBB"
			});
		} else if (zone_t == "Business") {
			$('.title_bg').css({
				"background-color" : "#87939B"
			});
		} else if (zone_t == "Fashion") {
			$('.title_bg').css({
				"background-color" : "#AD69C9"
			});
		} else if (zone_t == "Lifestyle") {
			$('.title_bg').css({
				"background-color" : "#E58B41"
			});
		} else if (zone_t == "Film") {
			$('.title_bg').css({
				"background-color" : "#20262B"
			});
		} else if (zone_t == "Food") {
			$('.title_bg').css({
				"background-color" : "#80658A"
			});
		} else if (zone_t == "Gaming") {
			$('.title_bg').css({
				"background-color" : "#309C71"
			});
		} else if (zone_t == "Music") {
			$('.title_bg').css({
				"background-color" : "#DDDD3E"
			});
		} else if (zone_t == "Science") {
			$('.title_bg').css({
				"background-color" : "#35AABA"
			});
		} else if (zone_t == "Sports") {
			$('.title_bg').css({
				"background-color" : "#B56E3E"
			});
		} else if (zone_t == "Technology") {
			$('.title_bg').css({
				"background-color" : "#3E92C1"
			});
		}

		$('.articles').css({
			"width" : "570px",
			"height" : "600px",
			"position" : "relative",
			"float" : "left",
			"margin-left" : "-83px",
			"margin-top" : "-38px",
			"margin-right" : "100px"
		});

		$('#all_articles').css({
			"width" : "5000px"
		});

		$('.content_reading').css({
			"visibility" : "visible",
			"width" : "580px",
			"height" : "518px",
			"background-color" : "white",
			"margin-top" : "-20px"
		});

		$('.reading_text').css({
			"visibility" : "visible",
			"width" : "500px",
			"height" : "400px",
			"color" : "#13292D",
			"font-weight" : "300",
			"font-size" : "15px",
			"padding" : "20px 0 0 30px",
			"margin-top" : "20px"

		});

		$('.zone').css({
			"width" : "250px",
			"height" : "600px",
			"margin" : "10px 20px 20px 10px",
			"float" : "left"
		});

		$('.zone_bg').css({
			"width" : "250px",
			"height" : "60px",
			"margin-top" : "-185px"
		});

		$('.scanning').css({
			"width" : "40px",
			"margin-left" : "40px",
			"margin-top" : "295px"
		});
		$('.zone_title').css({
			"margin" : "-175px 0 0 -10px"

		});

		$('.line_horizontal').css({
			"margin-top" : "50px",
			"margin-left" : "200",
			"width" : "251px"

		});

		$('.zone_image').css({
			"width" : "250px",
			"height" : "170px",
			"visibility" : "hidden"
		});
		$('.zone_bg_reading').css({
			"display" : "inline"
		});

		$('.zone_image2').css({
			"display" : "none"
		});

		$('.lock_btn').css({
			"display" : "none"
		});

		$('.lock').css({
			"display" : "none"
		});

		$('.arrow_r').css({
			"display" : "none"
		});

		$('.arrow').css({
			"display" : "none"
		});

		$('.image_scanning').css({
			"display" : "none"
		});

		$('.article_side').css({
			"visibility" : "hidden"
		});

		$('.title_bg').css({
			"width" : "580px",
			"height" : "150px",
			"margin-left" : "0px",
			"margin-top" : "-117px",
			"position" : "relative",
		});

		$('.image_reading').css({
			"visibility" : "hidden",
			"width" : "220px",
			"height" : "130px",
			"margin" : "-450px 0 50px 30px"

		});

		$('.reading_footer').css({
			"visibility" : "visible",
			"color" : "#13292D",
			"font-weight" : "400",
			"font-size" : "13px",
			"padding" : "0 0 0 30px"
		});

		$('.article_title').css({
			"width" : "530px",
			"font-size" : "25px",
			"margin-top" : "35px",
			"padding-left" : "30px",
			"position" : "relative",
			"z-index" : "50"
		});

		$('.facebook_bg').css({
			"width" : "80px",
			"height" : "80px",
			"background-color" : "#415A83",
			"visibility" : "visible",
			"margin" : "-67px 0 0 420px"

		});

		$('.facebook').css({
			"width" : "45px",
			"height" : "45px",
			"visibility" : "visible",
			"margin" : "-80px 0 0 440px",
			"padding-bottom" : "0px"

		});

		$('.twitter_bg').css({
			"width" : "80px",
			"height" : "80px",
			"background-color" : "#0089B6",
			"visibility" : "visible",
			"margin" : "-101px 0 0 500px"

		});

		$('.twitter').css({
			"width" : "45px",
			"height" : "45px",
			"visibility" : "visible",
			"margin" : "-101px 0 0 520px",
			"padding-bottom" : "32px"

		});

		$('header').css({
			"position" : "fixed",
			"z-index" : "100",
			"overflow" : "hidden"
		});

		$('.main_btn').css({
			"position" : "fixed",
			"overflow" : "hidden"
		});

		$('.scanning').css({
			"position" : "fixed",
			"overflow" : "hidden"
		});

		$('#interaction_modes').css({
			"position" : "fixed"
		});

		$('body').css({
			"background" : "url('images/bg.jpg') repeat"
		});

		$('.scanning').css({
			"padding-top" : "90px"
		});

		$('#all_articles').css({
			"margin-left" : "80px"
		});

	}

	function toggleLockGlancing(e) {
		//STOP DE FLOW
		alert("Unlock");

	}
</script>
</html>