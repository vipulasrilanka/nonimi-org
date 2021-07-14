//This file was written to test JavaScript
//Copyright 2021 nonimi.org

var DebugIndex = 0;

//event Listners

window.addEventListener("load", windowLoad);

// => {
//   console.log ("Debug:("+DebugIndex+") Graphics.js load event");
//   DebugIndex ++;
//   const canvas = document.querySelector('#canvas');
//   const context = canvas.getContext("2d");
//
//   console.log ("Debug:("+DebugIndex+") context = "+ context);
//   DebugIndex ++;
//
//   //resizing
//   canvas.height = window.innerHeight;
//   canvas.width = window.innerWidth;
//
//   drawEmptyBox(context,'blue',5,30,30,300,300);
//   drawFilledBox(context,'purple',50,50,200,200);
//   drawFilledOutlinedBox(context,'black','red',5, 20, 20, 90, 90);
//
// })

window.addEventListener("resize", () => {
  // Below is not a blocking function. It just delay what's inside.
  setTimeout(function(){
      console.log ("Debug:("+DebugIndex+") Window Resize");
      DebugIndex ++;
    }, 25);

    canvas.height = window.innerHeight;
    canvas.width = window.innerWidth;
    const context = canvas.getContext("2d");
    drawFilledOutlinedBox(context,'black','red',5, 20, 20, (window.innerWidth)/5, (window.innerHeight)/5);


})

window.addEventListener("mousedown", mouseDownAction);
window.addEventListener("mouseup",mouseUpAction);

//main Functions

function windowLoad(){

  console.log ("Debug:("+DebugIndex+") Graphics.js load event");
  DebugIndex ++;
  const canvas = document.querySelector('#canvas');
  const context = canvas.getContext("2d");

  console.log ("Debug:("+DebugIndex+") context = "+ context);
  DebugIndex ++;

  //resizing
  canvas.height = window.innerHeight;
  canvas.width = window.innerWidth;

  drawEmptyBox(context,'blue',5,30,30,300,300);
  drawFilledBox(context,'purple',50,50,200,200);
  drawFilledOutlinedBox(context,'black','red',5, 20, 20, 90, 90);

}

function mouseDownAction(event){
  console.log ("Debug:("+DebugIndex+") mouseDownAction ("+event.clientX +"," +event.clientY + ")");
  DebugIndex ++;
  const context = canvas.getContext("2d");
  drawEmptyBox(context,'blue',5,0,0,event.clientX,event.clientY);
  window.addEventListener("mousemove", mouseMoveAction);
}

function mouseUpAction(event){
  console.log ("Debug:("+DebugIndex+") mouseUpAction ("+event.clientX +"," +event.clientY + ")");
  DebugIndex ++;
  const context = canvas.getContext("2d");
//  drawEmptyBox(context,'blue',5,0,0,event.clientX,event.clientY);
  window.removeEventListener("mousemove", mouseMoveAction);
}

function mouseMoveAction(event){
  console.log ("Debug:("+DebugIndex+") mouseMoveAction ("+event.clientX +"," +event.clientY + ")");
  DebugIndex ++;
  const context = canvas.getContext("2d");
//  drawEmptyBox(context,'blue',5,0,0,event.clientX,event.clientY);
}

//Draw Functions

function drawEmptyBox(where, color, lineWidth, fromX, fromY, toX, toY ){
  console.log ("Debug:("+DebugIndex+") Draw Empty Box");
  DebugIndex ++;
  console.log ("Debug:("+DebugIndex+") context = "+ where);
  DebugIndex ++;
  where.strokeStyle = color;
  where.lineWidth = lineWidth;
  where.strokeRect(fromX, fromY, toX, toY);

}

function drawFilledBox(where, color, fromX, fromY, toX, toY ){
  console.log ("Debug:("+DebugIndex+") Draw Empty Box");
  DebugIndex ++;
  console.log ("Debug:("+DebugIndex+") context = "+ where);
  DebugIndex ++;
  where.fillStyle = color;
  where.fillRect(fromX, fromY, toX, toY);
}

function drawFilledOutlinedBox(where, OutlineColor, FillColor, lineWidth, fromX, fromY, toX, toY ){
  console.log ("Debug:("+DebugIndex+") Draw Empty Box");
  DebugIndex ++;
  console.log ("Debug:("+DebugIndex+") context = "+ where);
  DebugIndex ++;
  where.fillStyle = FillColor;
  where.strokeStyle = OutlineColor;
  where.lineWidth = lineWidth;
  where.fillRect(fromX, fromY, toX, toY);
  where.strokeRect(fromX, fromY, toX, toY);

}
