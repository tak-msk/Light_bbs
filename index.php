<?php
	include_once 'header.php';
	include_once 'definition.php';
	include_once 'function.php';

	// initialize nums
	foreach (array('name', 'email', 'text', 'token', 'page', 'submit') as $v) {
		$$v = isset($_POST[$v]) && is_string($_POST[$v]) ? trin($_POST[$v]) : '';
	}

	// fix page number to be more than 1
	$page = max(1, (int)$page);

	// initialize session
	session_name(SESSION_NAME);
	@session_start(); // session start
	// initialize session nums
	if (!$_SESSION) {
		$_SESSION = array(
			'name'  => '',
			'email' => '',
			'text'  => '',
			'token' => array(),
			'prev'  => null,
		);
	}

	// using PDO
	try {
	
		// connect
		$pdo = new PDO(DB_DSN, DB_USER, DB_PASS);
		$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// when submit button clicked
		if ($submit) {
			try {
				// set information for sessions nums
				$_SESSION['name'] = $name;
				$_SESSION['email'] = $email;
				$_SESSION['text'] = $text;
				// One time token
				if (!isset($_SESSION['token'][$token])) {
					throw e('Token error', $e);
				}
				// use one time token
				unset($_SESSION['token'][$token]);
				if ($_SESSION['prev'] != null) {
					$diff = $SERVER['REQUEST_TIME'] - $_SESSION['prev'];
					if (($limit = LIMIT_SEC - $diff) > 0) {
						throw e("Too early to post. Please wait {$limit}sec.", $e);
					}
				}
				// Check the name
				if (!$len = mb_strlen($name) or $len > 30) {
					$e = e('Please set your name in 30 letters.', $e);
				}
				// Check the email
				if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
					$e = e('Please set valid email address.', $e);
				}
				if (!$len = mb_strlen($text) or $len >= 140) {
					$e = e('Please set a comment in 140 letters.', $e);
				}
				// if there is some error, throw this.
				if (!empty($e)) {
					throw $e;
				}
				// Create prepared statement
				$stmt = $pdo->prepare(implode(' ', array(
					'INSERT',
					'INTO mini_bbs(`name`, `email`, `text`, `created_at`)',
					'VALUES(?, ?, ?, ?)',
				)));
				// Write to the db.
				$stmt->execute(array(
					$name,
					$email,
					$text,
					date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME'])
				));
				// log session time, and set a message
				$_SESSION['prev'] = $_SERVER['REQUEST_TIME'];
				// reset form
				$SESSION['text'] = '';
				throw e('Succeed.', $e);
			} catch (Exception $e) { }
		}
		// Create prepared statement (to show)
		// I heard that SQL_CALC_FOUND_ROWS is not good...(Tak)
		$stmt = $pdo->prepare(implode(' ', array(
			'SELECT',
			'SQL_CALC_FOUND_ROWS `name`, `email`, `text`, `created_at`',
			'FROM mini_bbs',
			'ORDER BY `id` DESC',
			'LIMIT ?, ?',
		)));
		// Bind values
		$stmt->bindValue(1, ($page - 1) * DISP_MAX, PDO::PARAM_INT);
		$stmt->bindValue(2, DISP_MAX, PDO::PARAM_INT);

		// Read the db
		$stmt->execute();
		// Get infos with a page number
		$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
		// Set sum of current page
		$current_count = count($articles);
		// Set sum of all pages
		$whole_count = (int)$pdo->query('SELECT FOUND_ROWS()')->fetchColumn();
		// Set # of pages
		$page_count = ceil($whole_count/DISP_MAX);
	} catch (Exception $e) { }
	// Prepare for next one time token
	$_SESSION['token'] = array_slice(
		array($token = sha1(mt_rand()) => 1) + $_SESSION['token'],
		0,
		TOKEN_MAX
	);
	// submit header
	header('Content-type: application/xhtml+xml; charset=utf-8');
?>
<!-- .container main-content -->
<div class="container main-content">
	<div class="row form">
		<form action="" class="form-horizontal" method="post">
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-2">
					<h2>Comment</h2>
				</div>
			</div>
			
			<!-- validation -->

			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-7">
				<input type="text" name="name" value="<?php h($_SESSION['name']);?>" class="form-control" placeholder="Name">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-7">
				<input class="form-control" type="text" name="email" value="<?php h($_SESSION['email']); ?>" placeholder="E-mail">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-8">
				<textarea class="form-control" name="text" value="<?php h($_SESSION['text']);?>" rows="5" placeholder="Comment"></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-2">
					<button type="submit" class="btn btn-default" name="submit">Send</button>
				</div>
				<label><input type="hidden" name="token" value="<?php h($token);?>"/></label>
			</div>
		</form>
	</div>
	<div class="row">
		<div class="col-md-9 content-area">
			<h2>Title</h2>
			<p>Consectetur nobis voluptates repudiandae pariatur soluta dignissimos expedita. Ipsum eius officia laborum voluptate voluptate doloremque quod dolor omnis. Dolore libero ratione itaque excepturi quisquam quos! Ab laboriosam consequatur voluptatum aliquam!</p>
			<p>Consectetur nobis voluptates repudiandae pariatur soluta dignissimos expedita. Ipsum eius officia laborum voluptate voluptate doloremque quod dolor omnis. Dolore libero ratione itaque excepturi quisquam quos! Ab laboriosam consequatur voluptatum aliquam!</p>
			<p>Consectetur nobis voluptates repudiandae pariatur soluta dignissimos expedita. Ipsum eius officia laborum voluptate voluptate doloremque quod dolor omnis. Dolore libero ratione itaque excepturi quisquam quos! Ab laboriosam consequatur voluptatum aliquam!</p>
			<p>Consectetur nobis voluptates repudiandae pariatur soluta dignissimos expedita. Ipsum eius officia laborum voluptate voluptate doloremque quod dolor omnis. Dolore libero ratione itaque excepturi quisquam quos! Ab laboriosam consequatur voluptatum aliquam!</p>
			<p>Consectetur nobis voluptates repudiandae pariatur soluta dignissimos expedita. Ipsum eius officia laborum voluptate voluptate doloremque quod dolor omnis. Dolore libero ratione itaque excepturi quisquam quos! Ab laboriosam consequatur voluptatum aliquam!</p>
			<p>Consectetur nobis voluptates repudiandae pariatur soluta dignissimos expedita. Ipsum eius officia laborum voluptate voluptate doloremque quod dolor omnis. Dolore libero ratione itaque excepturi quisquam quos! Ab laboriosam consequatur voluptatum aliquam!</p>
			<p>Consectetur nobis voluptates repudiandae pariatur soluta dignissimos expedita. Ipsum eius officia laborum voluptate voluptate doloremque quod dolor omnis. Dolore libero ratione itaque excepturi quisquam quos! Ab laboriosam consequatur voluptatum aliquam!</p>
			<p>Consectetur nobis voluptates repudiandae pariatur soluta dignissimos expedita. Ipsum eius officia laborum voluptate voluptate doloremque quod dolor omnis. Dolore libero ratione itaque excepturi quisquam quos! Ab laboriosam consequatur voluptatum aliquam!</p>
			<p>Consectetur nobis voluptates repudiandae pariatur soluta dignissimos expedita. Ipsum eius officia laborum voluptate voluptate doloremque quod dolor omnis. Dolore libero ratione itaque excepturi quisquam quos! Ab laboriosam consequatur voluptatum aliquam!</p>
			<p>Consectetur nobis voluptates repudiandae pariatur soluta dignissimos expedita. Ipsum eius officia laborum voluptate voluptate doloremque quod dolor omnis. Dolore libero ratione itaque excepturi quisquam quos! Ab laboriosam consequatur voluptatum aliquam!</p>
		</div><!-- /.col-md-9 content-area -->
		<div class="col-md-3 sidebar">
			<aside>
				<h4>Link to category</h4>
				<ul class="list-unstyled">
					<li><a href="#">Link</a></li>
					<li><a href="#">Link</a></li>
					<li><a href="#">Link</a></li>
					<li><a href="#">Link</a></li>
					<li><a href="#">Link</a></li>
				</ul>
			</aside>

			<aside>
				<h4></h4>
				<ul class="list-unstyled">
					<li><a href="#">Title of article</a></li>
					<li><a href="#">Title of article</a></li>
					<li><a href="#">Title of article</a></li>
					<li><a href="#">Title of article</a></li>
					<li><a href="#">Title of article</a></li>
				</ul>
			</aside>
		</div><!-- /.col-md-3 sidebar -->
	</div>
</div><!-- /.container main-content -->

<?php 
	include_once 'footer.php'
?>
