<html>
<head>
<style>
body  {
    background-image: url("woodbg.jpg");
    background-color: #cccccc;
}
</style>
</head>
<body><?php
/***
* File: index.php
* Author: CHINTAN D SHAH, *  Tic Tac Toe
***/
require_once('oop/class.game.php');
require_once('oop/class.tictactoe.php');

//this will store their information as they refresh the page
session_start();

//if they haven't started a game yet let's load one
if (!isset($_SESSION['game']['tictactoe']))
	$_SESSION['game']['tictactoe'] = new tictactoe();

?>
<html>
	<head>
		<title>Saurabh vs Chintan</title>
		<link rel="stylesheet" type="text/css" href="inc/style.css" />
	</head>
	<body>
		<div id="content">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<h2>Chintan Shah Vs Saurabh Gupta</h2>
		<?php
			$_SESSION['game']['tictactoe']->playGame($_POST);
		?>
		</form>
		</div>
		<br>
		<p><a title="Play1" href="http://codd.cs.gsu.edu/~sgupta13/project2/jack.html">Want to Study/Play</a></p>
		</body>
</html>