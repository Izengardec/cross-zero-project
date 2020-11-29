<?php
class Model{
  private $link;
  public function __construct($link){
    $this->link=$link;
  }
  public function check_login($login,$link){
    if (isset($login))
    {
      $query="SELECT  `mail` FROM `users` WHERE mail='".$login."'";
      $result2=mysqli_query($link,$query)or die($query.mysqli_error($link));
      if (mysqli_num_rows($result2)!=0){
        return 1;
      } else return 0;
    }
  }
  public function check_nick($nick,$link){
    if (isset($nick))
    {
      $query="SELECT  `nickname` FROM `users` WHERE nickname='".$nick."'";
      $result2=mysqli_query($link,$query)or die($query.mysqli_error($link));
      if (mysqli_num_rows($result2)!=0){
        return 1;
      } else return 0;
    }
  }
}
 ?>
