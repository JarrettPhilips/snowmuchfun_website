//Get the HTML elements
var modal = document.getElementById('loginModal');
var btn = document.getElementById("loginBtn");
var span = document.getElementsByClassName("close")[0];
runModal(btn, span, modal);

var modal = document.getElementById('commentModal');
var btn = document.getElementById("commentBtn");
var span = document.getElementsByClassName("close")[1];
runModal(btn, span, modal);

function runModal(btn, span, modal){
  //Opens modal on button click
  btn.onclick = function(){
    modal.style.display = "block";
  }
  //Closes modal on button click
  span.onclick = function(){
    modal.style.display = "none";
  }
  //Closes modal when user clicks on anything else
  window.onclick = function(event){
    if(event.target == modal){
      modal.style.display = "none";
    }
  }
  return 1;
}
