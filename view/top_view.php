<?php
class View{
  private $model;
  private $controller;
  public function __construct($controller,$model){
    $this->controller = $controller;
    $this->model = $model;
  }
  public function output_top(){
    $s='';
      $row=$this->model->top_players();
      $count=1;
      foreach ($row as $key) {
        $s.="<p style='width: 100%;font-size:25;margin-bottom:5px'>$count. ".$this->model->nickname($key[0])." - ".$key[1]." winings</p>";
        ++$count;
      }
      return $s;
  }
}
 ?>
