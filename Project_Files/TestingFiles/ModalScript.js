//Get the HTML elements
var modal = document.getElementById('myModal');
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];

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
