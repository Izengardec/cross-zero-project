<?php
session_start();
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
    header ('Location: index.php');  // перенаправление на нужную страницу
    exit();    // прерываем работу скрипта, чтобы забыл о прошлом
  }
  public function changed_pass($id,$old_pass,$new_pass){
    //echo $old_pass.$new_pass;
    if($old_pass==$_SESSION['pass']){
      $this->model->change_pass($id,$new_pass);
      $_SESSION['pass']=$new_pass;
    }
  }
  public function changed_log($id,$new_log){

      if ($this->model->change_log($id,$new_log)==1)
        $_SESSION['login']=$new_log;

  }
  public function changed_nick($id,$new_nick){
      if ($this->model->change_nick($id,$new_nick)==1)
        $_SESSION['nick']=$new_nick;
  }

}
 ?>
