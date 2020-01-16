
//01 - Add function in your JavaScript file to alert the text "Clicked!", and have your button call this function when it is clicked.
function myFunction() {
    alert("Clicked!");
  }

// 1 Stretch Challenge - Change the background color to the value in the box using JQUERY
$(document).ready(function(){
    $('#buttonColor').click(function () {
        $('#div1').css("background-color", $('#text').val());
    });
});

// 2 Strech Challenge - Add another button to toggle the visibility of the third div. Use jQuery to make it slowly fade in and fade out, 

$(document).ready(function(){
    $("#fadeMe").click(function(){
      $(".div3").fadeToggle("slow");
    });
  });


// Answer

// function changeColor() {
// 	var textbox_id = "txtColor";
// 	var textbox = document.getElementById(textbox_id);

// 	var div_id = "div1";
// 	var div = document.getElementById(div_id);

// 	// We should verify values here before we use them...
// 	var color = textbox.value;
// 	div.style.backgroundColor = color;

// }