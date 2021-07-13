//This file was written to test JavaScript
//Copyright 2021 nonimi.org

function showTime(){
  var number1 = Math.random(); //random Number between 0 - 1, not including 1
  var number2 = 100;
  var number3 = number1 * number2;
  number3 = Math.round(number3); //round off to whole Number

  //Get the ID to VariableText
  var variableText = document.getElementById('variableText');
  variableText.innerHTML = '('+ number3+') '+Date()+' ('+ number3 +')';
}

function changeTextColor(selection){
  var variableText = document.getElementById('variableText');
  variableText.style.color = selection.value;
}
