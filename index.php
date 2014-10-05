<DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test BBS</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-header">
			<!-- Site name(Logo) -->
			<a class="navbar-brand" href="#">Test BBS</a>
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
				<li><a href="">Link1</a></li>
				<li><a href="">Link2</a></li>
				<li><a href="">Link3</a></li>
				<!-- Dropdown list -->
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Drop<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="#">Link1</a></li>
						<li><a href="#">Link2</a></li>
						<li><a href="#">Link3</a></li>
						<li class="divider"></li>
						<li><a href="#">Link A</a></li>
						<li class="divider"></li>
						<li><a href="#">Link B</a></li>
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

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

