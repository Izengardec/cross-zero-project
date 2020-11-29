btn1 = document.getElementById('before');
btn2 = document.getElementById('next');
elements = document.getElementsByClassName('field');
p = document.getElementById('info').innerHTML;
var str='';
for (var i = p.length-1; p[i]!=' '; i--) {
  str+=p[i];
}
str=reverseStr(str);
var count=0;
var arr=[];
for (var i = 0; i < str.length-1; i++) {
  arr.push(str[i]);
}
function reverseStr(str) {
	    return str.split("").reverse().join("");
	}
btn2.addEventListener('click', function(){
  if (count <= -1){count=0;}
  if (arr.length!=count){
  if (count%2==0){
    elements[arr[count]].src="images\\square-cross-100.png";
  } else elements[arr[count]].src="images\\square-zero-100.png";
  count++;

}
});
btn1.addEventListener('click', function(){
  if (count >= arr.length){count=arr.length-1}
  if (count>=0){
    elements[arr[count]].src="images\\square-100.png";
  count--;
}
});
