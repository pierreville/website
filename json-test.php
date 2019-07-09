<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset ="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>JSON Test</title>

	<link rel="stylesheet" href="/css/style.css">
	<link rel="icon" href="/images/favicon.ico">
</head>
<body class="flexbox">
	<header class="navigation">
		<div class="nav-container">
			<div class="brand">
				<a href="/">Pierre Bastien</a>
			</div>
			<nav>
				<div class="nav-mobile">
					<a id="nav-toggle" href="#!"><span></span></a>
				</div>
				<ul class="nav-list">
					<li><a href="#!">Connect</a>
						<ul class="nav-dropdown">
							<li><a href="http://scr.im/pierreville">Email</a></li>
							<li><a href="https://www.linkedin.com/in/pierrebastien/">LinkedIn</a></li>
							<li><a href="https://www.instagram.com/pierrebastien/">Instagram</a></li>
						</ul>
					</li>
					<li><a href="#!">Projects</a>
						<ul class="nav-dropdown">
							<li><a href="/coding.html">Coding</a></li>
							<li><a href="/website-projects.html">Websites</a></li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
	</header>

	<main>
		<article>
			<h1>Messing Around with JSON</h1>
			<h2>JSON from a URL (Object Method)</h2>
			<p>Working off this <a href="https://www.taniarascia.com/how-to-use-json-data-with-php-or-javascript/">tutorial</a>.</p>
			<?php
				$url = './data/lotr.json'; // path to your JSON file
				$data = file_get_contents($url); // put the contents of the file into a variable
				$characters = json_decode($data); // decode the JSON feed
				
			?>
			<p>A <a href="/data/lotr.json">JSON file</a>:</p><p><code><?php echo $data; ?></code></p>
			
			<p>A <code>foreach</code> loop:</p>
			<ul>
				<?php 
					foreach ($characters as $character) {
						echo '<li>' . $character->name . '</li>';
					}
				?>
			</ul>

			<p>A table:</p>

			<table>
				<thead>
					<tr>
						<th>Name</th>
						<th>Race</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($characters as $character) : ?>
						<tr>
							<td><?php echo $character->name; ?></td>
							<td><?php echo $character->race; ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>

			<h2>JSON from a URL (Associative Array Method)</h2>

			<p>The JSON as an array:</p>
			<p><code>
				<?php 
					$characters_aa = json_decode($data, true);
					print_r($characters_aa);
				?>
			</code></p>
			<p>A <code>foreach</code> loop this way:</p>

			<p>Characters</p>
			<ul>
				<?php
					foreach ($characters_aa as $character_aa) {
						echo '<li>' . $character_aa['name'] . '</li>';
					}
				?>
			</ul>

			<h2>Nested JSON</h2>

			<?php
				$url = './data/harry_potter_wands.json';
				$wands = file_get_contents($url);
				$wizards = json_decode($wands, true);
				echo '<p>Another <a href=' . $url . '>JSON file</a>:</p><p><code>' . $wands . '</code></p>';
				foreach ($wizards as $wizard) {
					echo '<h3>' . $wizard['name'] . '</h3>';
				}
			?>
		</article>
	</main>
	<footer>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="js/pb.js"></script>
	</footer>
	</body>
</html>