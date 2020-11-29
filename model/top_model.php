<?php
require_once 'model\model_parent.php';
class TopModel extends Model
{
    public function __construct($link){
      $this->link=$link;
    }
    public function top_players(){
      $query="SELECT `idUser`,COUNT(`idGame`) FROM `games` WHERE `Result`=1 GROUP BY `idUser` ORDER BY COUNT(`idGame`) DESC LIMIT 10";
      $result2=mysqli_query($this->link,$query)or die("Ошибка запроса".mysqli_error($this->link));
      $row = array();
      for ($i=0; $i < mysqli_num_rows($result2); $i++) {
        array_push ($row,mysqli_fetch_row($result2));
      }
      return $row;
    }
    public function nickname($id){
      $query="SELECT `nickname` FROM `users` WHERE `id`=$id";
      $result2=mysqli_query($this->link,$query)or die("Ошибка запроса".mysqli_error($this->link));
      $row =mysqli_fetch_row($result2);
      return $row[0];
    }
}
