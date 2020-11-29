<?php
require_once 'model\model_parent.php';
class ModelReg extends Model{
  public function __construct($link){
    $this->link=$link;
  }
  private function check_login($login){
    if (isset($login))
    {
      $query="SELECT  `mail` FROM `users` WHERE mail='".$login."'";
      $result2=mysqli_query($this->link,$query)or die("Ошибка запроса".mysqli_error($this->link));
      if (mysqli_num_rows($result2)!=0){
        return 1;
      } else return 0;
    }
  }
  public function sign_in($login,$password){
    if (isset($login) && isset($password))
    {
      $query="SELECT `id`, `mail`, `password`, `nickname` FROM `users` WHERE mail='$login' and password='$password'";
      $result2=mysqli_query($this->link,$query)or die("Ошибка запроса".mysqli_error($this->link));
      return mysqli_fetch_row($result2);
    } else return 0;
  }

  public function registration($login,$password,$nick){
    if (isset($login) && isset($password) && $this->check_login($login)==0)
    {
      $query="INSERT INTO `users`( `mail`, `password`,`nickname`) VALUES ('".$login."','".$password."','".$nick."')";
      $result2=mysqli_query($this->link,$query)or die("Ошибка запроса".mysqli_error($this->link));
      return 1;
    } else return 0;
  }

  public function add_game($player,$course){

    $result_game=0;
    if ($course[strlen($course)-1]=='!'){
      $result_game=1;
    } else if ($course[strlen($course)-1]=='?'){
      $result_game=2;
    } else if ($course[strlen($course)-1]=='-'){
      $result_game=3;
    }
    $query="INSERT INTO `games`(`idUser`, `Result`, `gameCourse`) VALUES ($player,$result_game,'$course')";
    $result2=mysqli_query($this->link,$query)or die($query.mysqli_error($this->link));
  }
}
?>
