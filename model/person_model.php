<?php
require_once 'model\model_parent.php';
class PersonModel extends Model
{
    public function __construct($link){
      $this->link=$link;
    }
  public function count_win($player){
    $query="SELECT COUNT( idGame ) FROM `games`WHERE idUser =$player and result=1";
    $result2=mysqli_query($this->link,$query)or die("Ошибка запроса".mysqli_error($this->link));
    $row =mysqli_fetch_row($result2);
    return $row[0];
  }
  public function count_lose($player){
    $query="SELECT COUNT( idGame ) FROM `games`WHERE idUser =$player and result=2";
    $result2=mysqli_query($this->link,$query)or die("Ошибка запроса".mysqli_error($this->link));
    $row =mysqli_fetch_row($result2);
    return $row[0];
  }
  public function count_game($player){
    $query="SELECT COUNT( idGame ) FROM `games` WHERE idUser = $player;";
    $result2=mysqli_query($this->link,$query) or die($query.mysqli_error($this->link));
    $row =mysqli_fetch_row($result2);
    return $row[0];
  }
  public function count_not_game($player){
    $query="SELECT COUNT( idGame ) FROM `games` WHERE idUser =$player and result=0";
    $result2=mysqli_query($this->link,$query)or die("Ошибка запроса".mysqli_error($this->link));
    $row =mysqli_fetch_row($result2);
    return $row[0];
  }
  public function count_draw($player){
    $query="SELECT COUNT( idGame ) FROM `games` WHERE idUser =$player and result=3";
    $result2=mysqli_query($this->link,$query)or die("Ошибка запроса".mysqli_error($this->link));
    $row =mysqli_fetch_row($result2);
    return $row[0];
  }
  public function all_game($player){
    $query="SELECT * FROM `games` WHERE idUser =$player";
    $result2=mysqli_query($this->link,$query)or die("Ошибка запроса".mysqli_error($this->link));
    $row = array();
    for ($i=0; $i < mysqli_num_rows($result2); $i++) {
      array_push ($row,mysqli_fetch_row($result2));
    }
    return $row;
  }
  public function change_log($id,$newlog){
    if ($this->check_login($login, $this->link)==0){
      $query="UPDATE `users` SET `mail`='$newlog' WHERE id=$id";
      $result2=mysqli_query($this->link,$query)or die($query.mysqli_error($this->link));
      return 1;
    } else return 0;
  }
  public function change_nick($id,$newnick){
    if ($this->check_nick($newnick, $this->link)==0){
      $query="UPDATE `users` SET `nickname`='$newnick' WHERE id=".$id;
      $result2=mysqli_query($this->link,$query)or die($query.mysqli_error($this->link));
      return 1;
    } else return 0;
  }
  public function change_pass($id,$newpass){
      $query="UPDATE `users` SET `password`='$newpass' WHERE id=$id";
      $result2=mysqli_query($this->link,$query)or die($query.mysqli_error($this->link));
    }
}

 ?>
