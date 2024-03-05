<!DOCTYPE HTML>
<?php

require_once "core/init.php";

$user = new User();
if ($user->isLoggedIn()) {
	Redirect::to("admin.php");
}

if(Input::exists()) {
	if(Token::check(Input::get("token"))) {
		$validate = new Validate();
		$validation = $validate->check($_POST, [
			"username" => ["required" => true],
			"password" => ["required" => true],

		]);

		if($validation->passed()) {
			$user = new User();

			$remember = Input::get("remember") === "on" ? true : false;
			$login = $user->login(
				Input::get("username"),
				Input::get("password"),
				$remember
			);

			if($login) {
				Session::flash(
					"success",
					"<h3>Welcome " . Input::get("username") . "!</h3>"
				);
				Redirect::to("admin.php");
			} else {
				Session::flash("failed", "Login Failed, Please try again.");
				Redirect::to("index.php");
			}
		} else {
			foreach ($validation->errors() as $error) {
				echo $error, "<br />";
			}
		}
	}
}
?>
<html>
	<head>
		<title>PATLOG by SPARKS</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Header -->
			<div id="header">

				<div class="top">

					<!-- Logo -->
						<div id="logo">
							
							<h1 id="title">PATLOG</h1>
							<p>A PAT testing logging system.</p>
						</div>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="#top" id="top-link"><span class="icon solid fa-home">Login</span></a></li>
							</ul>
						</nav>

				</div>

			
			</div>

		<!-- Main -->
			<div id="main">

				<!-- Intro -->
					<section id="top" class="one dark cover">
						<div class="container">

							<header>
								<h2> PATLOG </h2>
								<p>Login here:</p>
							</header>
							<form method="post" action="#">
											<label for="username">Username</label>
											<input type="text" name="username" id="username" value="" placeholder="Username" />
											<br />
											<label for="password">Password</label>
											<input type="password" name="password" id="password" value="" placeholder="Password" />
											<br />
											<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
											<input type="submit" value="Login" class="primary" />
											
											<br />
											<br />
											
											<?php if (Session::exists("failed")) {
              								 echo Session::flash("failed");
           									} ?>
											</div>
											</form>

						</div>
					</section>
			</div>

		<!-- Footer -->
			<div id="footer">

				<!-- Copyright -->
					<ul class="copyright">
						<li>&copy; SPARKS 2024. All rights reserved.</li>
					</ul>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>