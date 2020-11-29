<?php
  require_once 'controller\controller.php';
  require_once 'model\model.php';
  require_once 'view\view.php';
  require_once 'connection.php';
  $link=mysqli_connect($host,$user,$password,$database) or die("Ошибка".mysqli_error($link2));
  mysqli_set_charset($link,"utf8");
  $model = new ModelReg($link);
  $controller = new Controller($model);
  $view = new View($controller,$model);
  if (isset($_POST['nick']) && isset($_POST['login']) && isset($_POST['password']) ){
    if ($model->registration($_POST['login'],$_POST['password'],$_POST['nick'])){
      $controller->signing($_POST['login'],$_POST['password']);
    }
  } else if (isset($_POST['login']) && isset($_POST['password'])){
    $controller->signing($_POST['login'],$_POST['password']);
  }
 ?>
  <title>Sparta cross-zero</title>
	<meta charset="windows-1251">
  <LINK REL="stylesheet" HREF = "styles\auth.css">
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
<?php

  echo $view->output();
  mysqli_close($link);
?>
</body>
