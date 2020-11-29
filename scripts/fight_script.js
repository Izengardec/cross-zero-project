
course = document.getElementById("course");
course.value='';
arr = [0,1,2,3,4,5,6,7,8];
arr_player = [];
arr_enemy = [];
elements= document.getElementsByClassName('field');
for (var i = 0; i < elements.length; ++i) {
  elements[i].addEventListener('click',function () {
    if(arr.indexOf(this.id-1)!=-1 && !end_game()){
      arr_player.push(this.id-1);
      this.src="images\\square-cross-100.png";
      course.value+=(this.id-1);
      arr.splice(arr.indexOf(this.id-1),1);
      console.log(this.id-1);
      end_game();
      if (arr.length!=0 && !end_game()){
        enemy_turn(arr);
        end_game();
      } else if (arr.length==0 && course.value[course.value.length-1]!='?' && course.value[course.value.length-1]!='!') {
        course.value+='-';
        document.getElementById('message').innerHTML="DRAW";
    }
    }
  });
}
function enemy_turn(arr){
  var i = arrayRandElement(arr);
  console.log(i);
  arr_enemy.push(i);
  elements[i].src="images\\square-zero-100.png";
  arr.splice(arr.indexOf(i),1);
  course.value+=i;
}
function arrayRandElement(arr) {
  var rand = Math.floor(Math.random() * arr.length);
  return arr[rand];
}
function end_game(){
  if (contains(arr_enemy,[0,1,2])||contains(arr_enemy,[3,4,5])||contains(arr_enemy,[6,7,8])||contains(arr_enemy,[0,3,6])||contains(arr_enemy,[1,4,7])||contains(arr_enemy,[2,5,8])||contains(arr_enemy,[0,4,8])||contains(arr_enemy,[2,4,6])){
    console.log("you lose");
    if (course.value[course.value.length-1]!='?'){
      course.value+='?';
      document.getElementById('message').innerHTML="LOSE";
    }
    return true;
  } else if (contains(arr_player,[0,1,2])||contains(arr_player,[3,4,5])||contains(arr_player,[6,7,8])||contains(arr_player,[0,3,6])||contains(arr_player,[1,4,7])||contains(arr_player,[2,5,8])||contains(arr_player,[0,4,8])||contains(arr_player,[2,4,6])){
    console.log("you win!");
    if (course.value[course.value.length-1]!='!'){
      course.value+='!';
      document.getElementById('message').innerHTML="WIN!!!";
    }
    return true;
  } else if (arr.length==0){
    return true;
  }
  return false;
}
function contains(where, what){
    for(var i=0; i<what.length; i++){
        if(where.indexOf(what[i]) == -1) return false;
    }
    return true;
}
