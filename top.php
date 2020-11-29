<?php
session_start();
  require_once 'controller\controller.php';
  require_once 'model\top_model.php';
  require_once 'view\top_view.php';
  require_once 'connection.php';
  $link2=mysqli_connect($host,$user,$password,$database) or die("Ошибка".mysqli_error($link2));
  mysqli_set_charset($link2,"utf8");
  $model = new TopModel($link2);
  $controller = new Controller($model);
  $view = new View($controller,$model);
 ?>
<head>
  <title>Sparta cross-zero</title>
	<meta charset="utf-8">
  <LINK REL="stylesheet" HREF = "styles\menu_styles.css">
  <LINK REL="stylesheet" HREF = "styles\person_style.css">
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
  <div class= "container">
    <?php echo $view->output_top() ?>
  </div>
  <?php mysqli_close($link2);?>
</body>
