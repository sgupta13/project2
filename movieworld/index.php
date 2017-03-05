<html>
<head>
<style>
body  {
    background-image: url("hollywoodbg.jpg");
    background-color: #cccccc;
}
</style>
</head>
<body><!DOCTYPE html>
<html>
<head>
<style>
div.img {
    margin: 5px;
    border: 1px solid #ccc;
    float: left;
    width: 180px;
}

div.img:hover {
    border: 1px solid #777;
}

div.img img {
    width: 100%;
    height: auto;
}

div.desc {
    padding: 15px;
    text-align: center;
}
</style>
</head>
<body>

<div class="img">
  <a target="_blank" href="terminator.jpg">
    <img src="terminator.jpg" alt="Trolltunga Norway" width="300" height="200">
  </a>
  <div class="desc">TERMINATOR</div>
</div>



<div class="img">
  <a target="_blank" href="spiderman.jpg">
    <img src="spiderman.jpg" alt="Northern Lights" width="600" height="400">
  </a>
  <div class="desc">SPIDERMAN</div>
</div>
<div class="img">
  <a target="_blank" href="batman.jpg">
    <img src="batman.jpg" alt="Northern Lights" width="600" height="200">
  </a>
  <div class="desc">BATMAN</div>
</div>
<div class="img">
  <a target="_blank" href="superman.jpg">
    <img src="superman.jpg" alt="Northern Lights" width="600" height="400">
  </a>
  <div class="desc">SUPERMAN</div>
</div>
<div class="img">
  <a target="_blank" href="fightclub.jpg">
    <img src="fightclub.jpg" alt="Northern Lights" width="600" height="400">
  </a>
  <div class="desc">FIGHT CLUB</div>
</div>
<div class="img">
  <a target="_blank" href="pirates.jpg">
    <img src="pirates.jpg" alt="Northern Lights" width="600" height="400">
  </a>
  <div class="desc">PIRATES OF CARRABIEAN</div>
</div>



</body>
</html>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


<?php 
require_once 'intermediate.php';
$hangman = CDSHAH\Hangman::getInstance(array('JOHN', 'JOHNNY', 'TOBEY', 'BRADD', 'CHRISTIAN', 'BEN'), 10);
$hangman->run();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Movie World - Chintan D Shah & S Gupta</title>
</head>
</body>
	<header>
		<hgroup>
			<h1>Hollywood Stars!</h1>
			<h2>Guess the First Name of Actor</h2>
		</hgroup>
	</header>
	<div class="body">
		<section id="letters">
			<p><?php echo $hangman->message; ?></p>
			<h2><?php echo $hangman->secret; ?></h2>
		</section>
		<form method="POST">
			<input type="text" name="guess" placeholder="Enter a letter to guess." maxlength="1" />
			<input type="submit" value="Guess" />
		</form>
		<br>
		<p><a title="Play1" href="http://codd.cs.gsu.edu/~sgupta13/project2/jack.html">Want to Study/Play</a></p>
	</div>
	<footer>
		<h6>Created by Chintan D Shah & Saurabh Gupta</h6>
	</footer>
</body>
</html>