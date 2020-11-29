<?php
class Controller{
  private $model;
  public function __construct($model){
    $this->model=$model;
  }
  public function clicked($login,$password){

  }
  public function signing($login,$password){
    $row = $this->model->sign_in($login,$password);
    if (isset($row)){
      session_start();
      $_SESSION['iduser']=$row[0];
      $_SESSION['login']=$row[1];
      $_SESSION['pass']=$row[2];
      $_SESSION['nick']=$row[3];
      header ('Location: index.php');  // перенаправление на нужную страницу
      exit();    // прерываем работу скрипта, чтобы забыл о прошлом
      return 1;
    } else return 0;
  }
  public function end_session(){
    session_unset();
    session_destroy();
  }
}
 ?>
