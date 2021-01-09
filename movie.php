<?  include_once("connect.php");
    $id=$_REQUEST['id'];
    $sql="SELECT POS_MIVE, TESER_MIVE, NAME_MIVE FROM movie WHERE ID_MIVE='$id'";
    $exec=$conn->query($sql);
    $ref=$exec->fetch();
?>
<!doctype html>
<html lang="">
    <head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title><?echo $ref[2];?></title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- favicon
		============================================ -->
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
		
		<!-- Google Fonts
		============================================ -->
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
		<!-- Bootstrap CSS
		============================================ -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Bootstrap CSS
		============================================ -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- style CSS
		============================================ -->
        <link rel="stylesheet" href="style.css">
		<!-- demo4 CSS
		============================================ -->
        <link rel="stylesheet" href="css/demo4.css">
		<!-- responsive CSS
		============================================ -->
        <link rel="stylesheet" href="css/responsive.css">
    </head>
	<body class="demo4-bg">
		<!--[if lt IE 8]>
			<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->
		<!-- video-section-start -->
		<div class="displaytable">
			<div class="displaytablecell">
				<div class="demo4 video-area">
					<div id="wrapper">
						<div class="videoContainer">
							<video id="myVideo" controls preload="auto" poster="movie/poster/<?=$ref[0];?>" >
								<source src="movie/tes/<?=$ref[1];?>" type="video/mp4" />
								<p>Your browser does not support the video tag.</p>
							</video>
							<div class="caption">Video Caption</div>
							<div class="control">
								<div class="btmControl">
									<div class="btnPlay btn" title="Play/Pause video"><span class="icon-play"></span></div>
									<div class="progress-line">
										<div class="progres">
											<span class="bufferBar"></span>
											<span class="timeBar"></span>
										</div>
									</div>
									<!--<div class="volume" title="Set volume">
										<span class="volumeBar"></span>
									</div>-->
									<div class="sound sound2 btn" title="Mute/Unmute sound"><span class="icon-sound"></span></div>
									<div class="btnFS btn" title="Switch to full screen"><span class="icon-fullscreen"></span></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- video-section-end -->
		<!-- jquery
		============================================ -->		
        <script src="js/jquery-1.11.3.min.js"></script>
		<!-- bootstrap JS
		============================================ -->		
        <script src="js/bootstrap.min.js"></script>
		<!-- main JS
		============================================ -->
        <script src="js/demo4.js"></script>
    </body>
</html>
