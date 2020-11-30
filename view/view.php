<?php
class View{
  private $model;
  private $controller;
  public function __construct($controller,$model){
    $this->controller = $controller;
    $this->model = $model;
  }
  public function output(){
    if (!isset($_GET['registr'])){
    return '<form method="post" class="form_auth">
      <div class="form-group" method="post">
        <label for="exampleInputEmail1">Email address</label>
        <input name="login" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
        <input name="checkLog" type="submit" class="btn btn-primary" text="sign in">
        <a href = "auth.php?registr=1">Registration</a>
      </div>';
    } else {
      return '<form method="post" class="form_auth">
        <div class="form-group" method="post">
          <label for="exampleInputEmail1">Email address</label>
          <input name="login" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
        </div>
        <div class="form-group" method="post">
          <label for="exampleInputPassword1">Password</label>
          <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
        </div>
        <div class="form-group">
          <label for="exampleInputNick">Nickname</label>
          <input name="nick" type="text" class="form-control" id="exampleInputPassword1" placeholder="Nickname" required>
          <input name="checkLog" type="submit" class="btn btn-primary" text="sign in">
          <a href = "auth.php">sig in</a>
        </div>';
      }
    }
    public function output_statistic($idUser){
      $procent=($this->model->count_game($idUser)!=0)?$this->model->count_win($idUser)/$this->model->count_game($idUser):"0";
      $s='';
      $s="<p>Games played:</p>".$this->model->count_game($idUser)."
      <br><p>Winnings:</p>".$this->model->count_win($idUser)."
      <br><p>Losing:</p>".$this->model->count_lose($idUser)."
      <br><p>Number of not finished games:</p>".$this->model->count_not_game($idUser).
      "<br><p>Draw:</p>".$this->model->count_draw($idUser)."
      <br><p>Procent win:</p>".$procent*100 ."%";
      foreach ($this->model->all_game($idUser) as $game) {
        $tmp='not finished';
        if ($game[3][strlen($game[3])-1]=='!'){
          $tmp='won';
        } else if ($game[3][strlen($game[3])-1]=='?'){
          $tmp='lost';
        } else if ($game[3][strlen($game[3])-1]=='-'){
          $tmp='drew';
        }
         $s.='<br><a href="game.php?game='.$game[1].'&course='.$game[3].'" target="_blank">Game #'.$game[1].' you '.$tmp.' this game</a>';
      }
      return $s;
    }
}
?>
