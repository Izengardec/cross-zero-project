<?php
session_start();
  require_once 'controller\controller.php';
  require_once 'model\model.php';
  require_once 'view\view.php';
  require_once 'connection.php';
 ?>
  <title>Sparta cross-zero</title>
	<meta charset="windows-1251">
  <LINK REL="stylesheet" HREF = "styles/main_style.css">
  <LINK REL="stylesheet" HREF = "styles\menu_styles.css">
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
<div class="choose">
  <div class="choose_btn" ><img id = "pvp" src="images\pvp.png"><p>PvP</p></div>
  <div class="choose_btn" ><img id ="pve" src="images\pve.png"><p>PvE</p></div>
</div>
<?php
  $link=mysqli_connect($host,$user,$password,$database) or die("Ошибка".mysqli_error($link2));
  mysqli_set_charset($link,"utf8");
  $model = new ModelReg($link);
  $controller = new Controller($model);
  $view = new View($controller,$model);

  if (isset($_GET['after']) && isset($_POST['course'])){
    $model->add_game($_SESSION['iduser'],$_POST['course']);
  }


  mysqli_close($link);

 ?>
<script src="scripts/main_script.js"></script>

</body>
