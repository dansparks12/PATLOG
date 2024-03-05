<!DOCTYPE HTML>
<?php

require_once "core/init.php";

$user = new User();
if (!$user->isLoggedIn()) {
	Redirect::to("index.php");
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
                    	<!-- About Me -->
					<section id="about" class="two">
						<div class="container">

							<header>
								<h2>About Me</h2>
							</header>

							<p>Tincidunt eu elit diam magnis pretium accumsan etiam id urna. Ridiculus
							ultricies curae quis et rhoncus velit. Lobortis elementum aliquet nec vitae
							laoreet eget cubilia quam non etiam odio tincidunt montes. Elementum sem
							parturient nulla quam placerat viverra mauris non cum elit tempus ullamcorper
							dolor. Libero rutrum ut lacinia donec curae mus vel quisque sociis nec
							ornare iaculis.</p>

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