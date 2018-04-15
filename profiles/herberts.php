
<?
	$con = mysqli_connect('localhost', 'root', '', 'interns_data') or die("<div style=\"color:red;\"><h1>Connection to the database could not be established.</h1><br>");

	$query = mysqli_query($con, "SELECT * FROM `interns_data` WHERE `username` = 'herberts'");
	$row = mysqli_fetch_assoc($query);
	$name = $row['name'];
	$username = $row['username'];
	$image = $row['image_filename'];

	$result = $conn->query("SELECT * FROM `secret_word` WHERE 1");
	$result = $result->fetch(PDO::FETCH_OBJ);
	$secret_word = $result->secret_word;
?>

<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<title>Profile | Herbert</title>

		<style type="text/css">
			/**/
			* {
				margin: 0;
				padding: 0;
			}

			body {
				background: #ffffff;
				font-family: sans-serif, sans-serif;
				line-height: 1.5;
				font-size: 1em;
			}

			a {
				text-decoration: none;
			}

			a:hover {
				text-decoration: none;
			}

			ul {
				list-style: none;
			}

			.content {
				min-height: 850px;
				padding: 10px;
				margin-top: 30px;
			}

			.left {
				width: 55%;
				background: rgba(255, 255, 255, 0.9);
				padding: 10px;
				float: right;
				max-height: 700px;
				overflow: auto;
				margin-bottom: 10px;
				border: transparent;
				border-radius: 2px;
				transition: 2s ease-in-out;
			}

			.right {
				width: 40%;
				float: left;
			}

			.row {
				width: 100%;
				position: relative;
			}

			.image {
				width: 90%;
				margin: 0 auto;
				margin-bottom: 20px;
				height: 210px;
				background: #f3f3f3;
				box-shadow: 8px 8px 10px rgba(73, 98, 73, 0.5);
			}

			.pic{
				width: 21%;
				float: left;
			}

			.image img {
				min-height: 80px;
				max-width: 180px;
				min-width: 180px;
				position: relative;
				margin: 15px;
				height: 180px;
				float: left;
				border: 2px solid rgba(73, 98, 73, 0.5);
				border-radius: 5%;
			}

			.name {
				width: 75%;
				margin: 0 auto;
				float: right;
				margin: 25px 15px 0 0;
			}

			.image .name span h3 {
				font-size: 1.7em;
			}

			.image .name span h4 {
				font-size: 1.4em;
			}

			.intro {
				padding: 20px 20px 10px 0;
				line-height: 1;
			}

			.image .name small {
				font-size: 0.7em;
				line-height: 1;
				font-style: italic;
			}

			.person {
				width: 100%;
				padding: 20px;
				margin-bottom: 15px;
				transition: 2s ease-in-out;
			}

			.person .desc {
				background-color: rgba(212, 215, 73, 0.5);
				box-shadow: 7px 8px 4px rgba(73, 98, 73, 0.5);
				width: 100%;
				border-radius: 10px;
			}

			.person .desc h3 {
				background: #f3f3f3;
				padding: 5px 0 5px 10px;
				font-size: 1.3em;
				border-radius: 10px 10px 0 0;
			}

			.person .description {
				padding: 10px;
				margin-bottom: 25px;
			}

			.person .res {
				background-color: rgba(212, 215, 73, 0.5);
				box-shadow: 7px 8px 4px rgba(73, 98, 73, 0.5);
				width: 100%;
				border-radius: 10px;
			}

			.person .res h3 {
				background: #f3f3f3;
				padding: 5px 0 5px 10px;
				font-size: 1.3em;
				border-radius: 10px 10px 0 0;
			}

			.person .resume {
				padding: 10px;
			}

			.resume ul {
				list-style-type: lower-hexadecimal;
				padding-left: 25px;
			}

			.resume ul li{
				padding-left: 10px;
			}

			.posts {
				width: 100%;
				margin-top: 25px;
			}

			.action {
				background: #f3f3f3;
				margin-top: 10px;
			}

			.action ul {
				height: 45px;
			}

			.action ul li {
				display: inline;
				float: left;
				padding: 8px 48px 8px 48px;
				border-right: 1px solid #999;
				text-align: center;
			}

			.action ul li:last-child {
				border-right: none;
			}

			.post {
				max-width: 90%;
				margin: 0 auto;
				margin-bottom: 30px;
				padding: 10px;
				border-radius: 4px;
				border: 1px solid #999;
				background-color: rgba(212, 215, 73, 0.5);
				box-shadow: 10px 8px 10px rgba(73, 98, 73, 0.5);
			}

			.post p {
				padding: 5px;
			}

			footer {
				text-align: center;
				font-size: 0.9em;
				padding: 20px;
				background: rgba(73, 98, 73, 0.3);
				text-transform: capitalize;
			}

			footer span {
				font-size: 0.8em;
			}

		</style>

	</head>
<!--#-->
	<body>
		<div class="wrapper">
			<div class="inner">
				<div class="content">

					<div class="row">
						<div class="image">
							<div class="pic">
								<img src="<?echo $row['image_filename']?>" alt="Herberts" onerror="this.src='images/default.jpg'" title="Herberts">
							</div>
							
							<div class="name">
								<span><h3><?echo $row['name'];?></h3></span>
								<span><h4>@<?echo $row['username'];?></h4></span>
								<div class="intro">
									<small>
										Hardcore software developer with genuine passion for writing and reading codes. I enjoy seeing codes even if i don't really know what the code is for.
									</small>
								</div>
							</div>
						</div>
					</div>

					<div class="right">
						<div class="row">
							<div class="person">
								<div class="desc">
									<h3>Introduction</h3>
									<div class="description">
										<p>
											Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
											consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
											cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
											proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
										</p>
									</div>
								</div>
								<div class="res">
									<h3>Resume</h3>
									<div class="resume">
										<ul>
											<li>Lorem ipsum</li>
											<li>Dolor sit</li>
											<li>Amet consectetur</li>
											<li>Lorem ipsum</li>
											<li>Dolor sit</li>
											<li>Amet consectetur</li>
											<li>Lorem ipsum</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="left">
						<div class="row">
							<div class="posts">
								<div class="post">
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
										consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
										cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
										proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
									</p>
									<div class="action">
										<ul>
											<li><a href="#">Like</a></li>
											<li><a href="#">Comment</a></li>
											<li><a href="#">Share</a></li>
										</ul>
									</div>
								</div>
								<div class="post">
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
										consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
										cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
										proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
									</p>
									<div class="action">
										<ul>
											<li><a href="#">Like</a></li>
											<li><a href="#">Comment</a></li>
											<li><a href="#">Share</a></li>
										</ul>
									</div>
								</div>
								<div class="post">
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
										consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
										cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
										proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
									</p>
									<div class="action">
										<ul>
											<li><a href="#">Like</a></li>
											<li><a href="#">Comment</a></li>
											<li><a href="#">Share</a></li>
										</ul>
									</div>
								</div>
								<div class="post">
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
										consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
										cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
										proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
									</p>
									<div class="action">
										<ul>
											<li><a href="#">Like</a></li>
											<li><a href="#">Comment</a></li>
											<li><a href="#">Share</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
			<div class="row">
			</div>
		</div>
	</div>
	</body>
</html>