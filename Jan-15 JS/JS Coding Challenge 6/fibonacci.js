var numb = 0;
var series = document.getElementById("series");
document.getElementById("no").onchange = function n(e) {
  numb = e.target.value;
  console.log(numb);
};



function s(numb) {
  if (numb === 0) {
    return (series = 0);
  } else if (numb === 1) {
    return (series = 1);
  } else {
    return (series = s(numb - 1) + s(numb - 2));
  }
}
for (var i = 0; i < numb; i++) {
  document.getElementById("submitbtn").onclick = s(numb);
}
