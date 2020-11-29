<?php session_start();
if (!isset($_SESSION['iduser'])){
	header ('Location: auth.php');  // перенаправление на нужную страницу
	exit();
}?>
	<head>
		  <title>Sparta cross-zero</title>
			<meta charset="windows-1251">
		  <LINK REL="stylesheet" HREF = "styles\style_fight.css">
			<LINK REL="stylesheet" HREF = "styles\menu_styles.css">
		</head>
		<body>
		  <nav class="one">
		  <ul>
		    <li><a href="auth.php"><i class="fa fa-home fa-fw"></i>Authorization</a></li>
		    <li><a href="top.php">Top</a></li>
		    <li><a href="index.php">Cross-zero</a></li>
				<?php if (isset($_SESSION['iduser'])){
		      echo '<li><a href="person.php">'.$_SESSION['nick'].'</a></li>';
		    }
		     ?>
		  </ul>
		</nav>
		<div class="fight_field" style="display: table">
				  <div style="display: table-row">
						<img class="field" id="1" src="images\square-100.png" style="display: table-cell">
						<img class="field" id="2" src="images\square-100.png" style="display: table-cell">
						<img class="field" id="3"  src="images\square-100.png" style="display: table-cell">
				  </div>
				  <div style="display: table-row">
						<img class="field" id="4" src="images\square-100.png" style="display: table-cell">
						<img class="field" id="5" src="images\square-100.png" style="display: table-cell">
						<img class="field" id="6" src="images\square-100.png" style="display: table-cell">
				  </div>
				  <div style="display: table-row">
						<img class="field" id="7" src="images\square-100.png" style="display: table-cell">
						<img class="field" id="8" src="images\square-100.png" style="display: table-cell">
						<img class="field" id="9" src="images\square-100.png" style="display: table-cell">
				  </div>
					<div style="display: table-row">
						<form method="post" action='index.php?after=1'>
							<input id="course" type="text" name ="course" hidden>
							<input id="end" type="submit" value="End game" style="display: table-cell">
						</form>
				  </div>
		</div>
		<script src="scripts/fight_script.js"></script>
	</body>
</html>
