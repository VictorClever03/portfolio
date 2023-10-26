var message = "";
function clickIE() {
  if (document.all) {
    message;
    return false;
  }
}
function clickNS(e) {
  if (document.layers || (document.getElementById && !document.all)) {
    if (e.which == 2 || e.which == 3) {
      message;
      return false;
    }
  }
}
if (document.layers) {
  document.captureEvents(Event.MOUSEDOWN);
  document.onmousedown = clickNS;
} else {
  document.onmouseup = clickNS;
  document.oncontextmenu = clickIE;
}

document.oncontextmenu = new Function("return false");

//  F12
//==========

document.onkeypress = function (event) {
  if (e.ctrlKey && e.keyCode === 123) {
    // alert('not allowed');
    return false;
  }
};

//    CTRL + u
//==============



document.onkeydown = function (e) {
  if (e.ctrlKey && e.keyCode === 85) {
    // alert('not allowed');
    return false;
  }
 
  // console.log(e.keyCode);

};
