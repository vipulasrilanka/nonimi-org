//This file was written to test JavaScript
//Copyright 2021 nonimi.org

function showTime(){
  var number1 = Math.random();      //Random Number between 0 - 1, not including 1
  var number2 = 100;
  var number3 = number1 * number2;  //This will give us a number < 100
  number3 = Math.round(number3);    //round off to whole Number

  //Get the ID to VariableText in the html page
  var variableText = document.getElementById('variableText');
  variableText.innerHTML = '('+ number3+') '+Date()+' ('+ number3 +')';
}

//Change the color of the VariableText
function changeTextColor(selection){
  var variableText = document.getElementById('variableText');
  variableText.style.color = selection.value;
}
