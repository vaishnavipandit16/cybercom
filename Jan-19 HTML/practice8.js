function addOption(selectbox, text, value) {
  var optn = document.createElement("option");
  optn.text = text;
  optn.value = value;
  selectbox.options.add(optn);
}
function addOption_list() {
  for (var i = 1; i <= 31; ++i) {
    addOption(document.register_form.day_list, i, i);
  }
  for (var i = 1; i <= 12; ++i) {
    addOption(document.register_form.month_list, i, i);
  }
  for (var i = 1920; i < 2006; ++i) {
    addOption(document.register_form.year_list, i, i);
  }
}

function validate() {
  var pass = /\w[0-9]/;
  var p = document.getElementById("pass").value;
  if (p.length >= 8 && p.match(pass)) {
    return true;
  } else {
    alert("Password must have 8 maximum size and have 1 digit also.");
  }
}
