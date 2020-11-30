<?php
if(session_id() == '') {
    session_start();
} 
  require_once 'controller\controller.php';
  require_once 'model\person_model.php';
  require_once 'view\view.php';
  require_once 'connection.php';
  $link2=mysqli_connect($host,$user,$password,$database) or die("Ошибка".mysqli_error($link2));
  mysqli_set_charset($link2,"utf8");
  $model = new PersonModel($link2);
  $controller = new Controller($model);
  $view = new View($controller,$model);
  if (isset($_POST['change'])){
    if (isset($_POST['nick'])){
      $controller->changed_nick($_SESSION['iduser'],$_POST['nick']);
    }
    if (isset($_POST['email'])){
      $controller->changed_log($_SESSION['iduser'],$_POST['email']);
    }
    if (isset($_POST['old_pass']) && isset($_POST['new_pass'])){
      $controller->changed_pass($_SESSION['iduser'],$_POST['old_pass'],$_POST['new_pass']);
    }
  } else if (isset($_POST['sign_out'])){
    $controller->end_session();
  }
 ?>
<head>
  <title>Sparta cross-zero</title>
	<meta charset="windows-1251">
  <LINK REL="stylesheet" HREF = "styles\person_style.css">
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
  <div class="container">
    <form method="post" class="form_st">
      <label >Nickname</label>
      <input class="element_form" name="nick" type="text"<?php echo 'value="'.$_SESSION['nick'].'"' ?>>
      <br>
      <label >Email</label>
      <input class="element_form" name="email" type="email" <?php echo 'value="'.$_SESSION['login'].'"' ?>>
      <br>
      <label >Old password</label>
      <input class="element_form" name="old_pass" type="password">
      <br>
      <label >New password</label>
      <input class="element_form" name="new_pass" type="password">
      <br>
      <input class="element_form" name="change" type="submit" value="Change data">
      <br>
      <input class="element_form" name="sign_out" type="submit" value="Sign out" style="background-color:red">
    </form>
    <div class="form_st">
      <?php  echo $view->output_statistic($_SESSION['iduser']); ?>
    </div>
  </div>
<?php mysqli_close($link2);?>
</body>
