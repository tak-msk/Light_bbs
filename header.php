<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Snowboarding Style</title>

    <!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-header">
			<!-- Site name(Logo) -->
			<a class="navbar-brand" href="index.php">Snowboard Style</a>
			<!-- Setting toggle -->
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-content">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div id="nav-content" class="collapse navbar-collapse">
			<!-- Link list/ Menu list-->
			<ul class="nav navbar-nav">
				<li><a href="about.php">About</a></li>
				<li><a href="index.php">BBS</a></li>
				<li><a href="https://www.youtube.com/results?search_query=snowboarding" target="_blank">Youtube</a></li>
				<!-- Dropdown list -->
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Drop<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="http://www.burton.com/" target="_blank">Burton</a></li>
						<li><a href="http://en-us.k2snowboarding.com/" target="_blank">K2</a></li>
						<li><a href="http://www.salomon.com/us/" target="_blank">Salomon</a></li>
						<li class="divider"></li>
						<li><a href="https://www.facebook.com/tak.msk" target="_blank">facebook</a></li>
						<li class="divider"></li>
						<li><a href="mailto:tak.msk2580@gmail.com">Contact</a></li>
					</ul>
				</li>
			</ul>
			<form class="navbar-form navbar-right" role="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
	</nav>

	<header class="jumbotron">
		<div class="container">
			<h1>Snowboard Style</h1>
				<p>This is a test coding for DMTC.</p>
				<p><a class="btn btn-lg heading-btn" role="button" href="about.php">Learn more &raquo;</a></p>
		</div>
	</header>
